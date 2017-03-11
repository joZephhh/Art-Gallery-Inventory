<?php
//retrieve data
    $id = (int)$_POST["id"];
    $name = trim($_POST["name"]);
    $artist = trim($_POST["artist"]);
    $description = trim($_POST["description"]);
    $price= (int)$_POST["price"];
    $numberAvailable= (int)$_POST["numberAvailable"];
    $img = ""; // avoid undefind in case of no change
    $img_src = trim($_POST["img_src"]); // when no image is reupload on edit, keep the same picture

    // check and notice errors
    if (empty($name)) {
        $error_product["error_name"] = "Missing Value";
    }

    if (empty($artist)) {
        $error_product["error_artist"] = "Missing Value";
    }

    if (empty($description)) {
        $error_product["error_description"] = "Missing Value";
    }

    if (!empty($_FILES)) {
        // retrieve the file
        if (!$_FILES["img"]["name"]=='') {

            $img = $_FILES["img"];
            if($_FILES['img']['error'] > 0) {
                $error_product["error_img"] = "Error in upload";
            }
            if($_FILES["img"]["error"]==0) {
                $valid_extensions= array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                $extension_upload = strtolower(  substr(  strrchr($_FILES['img']['name'], '.')  ,1)  );
                if (!in_array($extension_upload,$valid_extensions)) {
                    $error_product["error_img"] = "File extension is not accepted";
                }
                else if($_FILES['img']['size'] > 2000000) { // 2mo
                    $error_product["error_img"] = "File too big";
                }
            }
        }
        else if (empty($img_src)) {
            $error_product["error_img"] = "Error in upload";
        }
    }

    if (empty($price)) {
        $error_product["error_price"] = "Missing Value";
    }

    if (empty($numberAvailable)) {
        $error_product["error_numberAvailable"] = "Missing Value";
    }

    if (!empty($error_product)) {
        $error_product["id"]=$id;
    }

    else if (empty($error_product)) {
        if (!empty($_FILES)) {
            if (!$_FILES["img"]["name"]=='') {
                $img_name = $_FILES["img"]["name"];

            }
            else {
                $img_name= $img_src;
            }
            move_uploaded_file($_FILES['img']['tmp_name'], "server/files/".$img_name);
        }
        $error_product["id"]="none"; // avoid errors
        // SQL edit request
        $prepare = $pdo -> prepare("UPDATE products
            SET name = :name,
            artist = :artist,
            description = :description,
            img = :img,
            price = :price,
            numberAvailable = :numberAvailable
            WHERE id = :id");

        // bind values and exec SQL edit request
        $prepare-> bindValue("name", $name);
        $prepare-> bindValue("artist", $artist);
        $prepare-> bindValue("description", $description);
        $prepare-> bindValue("img", $img_name);
        $prepare-> bindValue("price", $price);
        $prepare-> bindValue("numberAvailable", $numberAvailable);
        $prepare-> bindValue("id", $id);
        $exec = $prepare->execute();

        // set logs
        $logs = $pdo-> prepare("INSERT INTO logs (name, picture, type) VALUES (:username, :picture, :type)");
        $logs-> bindValue("username", $_SESSION["username"]);
        $logs-> bindValue("picture", $name);
        $logs-> bindValue("type", $_POST["type"]);
        $exec_logs = $logs->execute();

        // set the contribution
        $users = $pdo ->prepare("UPDATE users SET contributions=contributions +1 WHERE email = :email");
        $users->bindValue("email", $_SESSION["mail"] );
        $exec_users = $users->execute();

    }

 ?>
