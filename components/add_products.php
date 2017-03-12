<?php
// retrive all data form $_POST
$name = trim($_POST["name"]);
$artist = trim($_POST["artist"]);
$description = trim($_POST["description"]);
$price= (int)$_POST["price"];
$numberAvailable= (int)$_POST["numberAvailable"];


// check and notice errors
if (empty($name)) {
    $error_add_product["error_name"] = "Missing Value";
}

if (empty($artist)) {
    $error_add_product["error_artist"] = "Missing Value";
}

if (empty($description)) {
    $error_add_product["error_description"] = "Missing Value";
}

if($_FILES['img']['error'] > 0) {
    $error_add_product["error_img"] = "Error in upload";
}
if($_FILES["img"]["error"]==0) {
    $valid_extensions= array( 'jpg' , 'jpeg' , 'gif' , 'png' );
    $extension_upload = strtolower(  substr(  strrchr($_FILES['img']['name'], '.')  ,1)  );
    if (!in_array($extension_upload,$valid_extensions)) {
        $error_add_product["error_img"] = "File extension is not accepted";
    }
    else if($_FILES['img']['size'] > 2000000) { // 2mo
        $error_add_product["error_img"] = "File too big";
    }
}

if (empty($price)) {
    $error_add_product["error_price"] = "Missing Value";
}

if (empty($numberAvailable)) {
    $error_add_product["error_numberAvailable"] = "Missing Value";
}

if (!empty($error_add_product)) {
    $error_add_product["id"]="none";
}

else if (empty($error_add_product)){
    $img_name =$_FILES["img"]["name"]; // upload and move file
    move_uploaded_file($_FILES['img']['tmp_name'],"server/files/".$img_name);

    // SQL add request
    $prepare = $pdo -> prepare("INSERT INTO products (name, artist, description, img,  price, numberAvailable)
                                                    VALUES(:name, :artist, :description, :img,  :price, :numberAvailable)");

    // bind all values and execute request
    $prepare-> bindValue("name", $name);
    $prepare-> bindValue("artist", $artist);
    $prepare-> bindValue("description", $description);
    $prepare-> bindValue("img", $img_name);
    $prepare-> bindValue("price", $price);
    $prepare-> bindValue("numberAvailable", $numberAvailable);
    $exec = $prepare->execute();


    // set data in logs
    $logs = $pdo-> prepare("INSERT INTO logs (name, picture, type) VALUES (:username, :picture, :type)");
    $logs-> bindValue("username", $_SESSION["username"]);
    $logs-> bindValue("picture", $name);
    $logs-> bindValue("type", $_POST["type"]);
    $exec_logs = $logs->execute();

    // set the contribution
    $users = $pdo ->prepare("UPDATE users SET contributions = contributions +1 WHERE email = :email");
    $users->bindValue("email", $_SESSION["mail"] );
    $exec_users = $users->execute();

    // clear $_POST && $_FILES
    $_POST["type"]="";
    $_POST["name"]="";
    $_POST["artist"]="";
    $_POST["description"]="";
    $_POST["price"]="";
    $_POST["numberAvailable"]="";
    $_FILES["img"]="";


}

header("location: ".URL."/store");
exit;
 ?>
