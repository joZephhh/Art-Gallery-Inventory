<?php
// retrive all data form $_POST
$name = trim($_POST["name"]);
$artist = trim($_POST["artist"]);
$description = trim($_POST["description"]);
$price= (int)$_POST["price"];
$numberAvailable= (int)$_POST["numberAvailable"];
$img = $_FILES["img"];
$img_src = "none"; // avoid error;


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
    $nom =$_FILES["img"]["name"]; // upload and move file
    move_uploaded_file($_FILES['img']['tmp_name'],"server/files/".$nom);

    // SQL add request
    $prepare = $pdo -> prepare("INSERT INTO products (name, artist, description, img,  price, numberAvailable)
                                                    VALUES(:name, :artist, :description, :img,  :price, :numberAvailable)");

    // bind all values and execute request
    $prepare-> bindValue("name", $name);
    $prepare-> bindValue("artist", $artist);
    $prepare-> bindValue("description", $description);
    $prepare-> bindValue("img", $nom);
    $prepare-> bindValue("price", $price);
    $prepare-> bindValue("numberAvailable", $numberAvailable);
    $exec = $prepare->execute();


    // set data in logs
    $logs = $pdo-> prepare("INSERT INTO logs (picture, type) VALUES (:picture, :type)");
    $logs-> bindValue("picture", $name);
    $logs-> bindValue("type", $_POST["type"]);
    $exec_logs = $logs->execute();

    // clear $_POST && $_FILES
    $_POST["type"]="";
    $_POST["name"]="";
    $_POST["artist"]="";
    $_POST["description"]="";
    $_POST["price"]="";
    $_POST["numberAvailable"]="";
    $_FILES["img"]="";
}


 ?>
