<?php
$name = trim($_POST["name"]);
$artist = trim($_POST["artist"]);
$description = trim($_POST["description"]);
$price= (int)$_POST["price"];
$numberAvailable= (int)$_POST["numberAvailable"];

if (empty($name)) {
    $error_add_product["error_name"] = "Missing Value";
}
if (empty($artist)) {
    $error_add_product["error_artist"] = "Missing Value";
}
if (empty($description)) {
    $error_add_product["error_description"] = "Missing Value";
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

    $prepare = $pdo -> prepare("INSERT INTO products (name, artist, description, price, numberAvailable)
                                                    VALUES(:name, :artist, :description, :price, :numberAvailable)");
        $prepare-> bindValue("name", $name);
        $prepare-> bindValue("artist", $artist);
        $prepare-> bindValue("description", $description);
        $prepare-> bindValue("price", $price);
        $prepare-> bindValue("numberAvailable", $numberAvailable);
        $exec = $prepare->execute();

        // clear $_POST
        $_POST["type"]="";
        $_POST["name"]="";
        $_POST["artist"]="";
        $_POST["description"]="";
        $_POST["price"]="";
        $_POST["numberAvailable"]="";
}


 ?>
