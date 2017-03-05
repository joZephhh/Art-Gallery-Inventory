<?php
    $id = (int)$_POST["id"];
    $name = trim($_POST["name"]);
    $artist = trim($_POST["artist"]);
    $description = trim($_POST["description"]);
    $price= (int)$_POST["price"];
    $numberAvailable= (int)$_POST["numberAvailable"];
    if (empty($name)) {
        $error_product["error_name"] = "Missing Value";
    }
    if (empty($artist)) {
        $error_product["error_artist"] = "Missing Value";
    }
    if (empty($description)) {
        $error_product["error_description"] = "Missing Value";
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
        $error_product["id"]="none";
        $prepare = $pdo -> prepare("UPDATE products
            SET name = :name,
            artist = :artist,
            description = :description,
            price = :price,
            numberAvailable = :numberAvailable
            WHERE id = :id");

            $prepare-> bindValue("name", $name);
            $prepare-> bindValue("artist", $artist);
            $prepare-> bindValue("description", $description);
            $prepare-> bindValue("price", $price);
            $prepare-> bindValue("numberAvailable", $numberAvailable);
            $prepare-> bindValue("id", $id);
            $exec = $prepare->execute();
            // $error_product["error_name"] = "";
            // $error_product["error_artist"] = "";
            // $error_product["error_description"] = "";
            // $error_product["error_price"] = "";
            // $error_product["error_numberAvailable"] = "";
            // $error_product["id"] = "";

    }




 ?>
