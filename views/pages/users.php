<?php

$error_users = []; // init error array

    if(!empty($_POST)) {
        // retrive data of the form
        $user_name = $_POST["user_name"];
        $user_mail = $_POST["user_mail"];
        $user_password = $_POST["user_password"];

        // check errors
        if(empty($user_name))  {
            $error_users["error_name"] ="Missing value";
        }
        if(empty($user_mail))  {
            $error_users["error_mail"] ="Missing value";
        }
        if(empty($user_password))  {
            $error_users["error_password"] ="Missing value";
        }
        if ($_FILES["user_picture"]["error"]>0) {
            $error_users["error_img"] = "Error in upload";
        }

        // check differents files uploads errors
        if($_FILES["user_picture"]["error"]==0) {
            $valid_extensions= array( 'jpg' , 'jpeg' , 'gif' , 'png' );
            $extension_upload = strtolower(  substr(  strrchr($_FILES['user_picture']['name'], '.')  ,1)  );
            if (!in_array($extension_upload,$valid_extensions)) {
                $error_users["error_img"] = "File extension is not accepted";
            }
            else if($_FILES['user_picture']['size'] > 500000) {
                $error_users["error_img"] = "File too big";
            }
        }

        // if there is no errors
         if (empty($error_users)) {

            // retrieve data for check if the add is not a doublon
            $users_verification = $pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $users_verification->bindValue("email",$user_mail);
            $users_verification->execute();
            $verification_result = $users_verification->fetchAll();

            // if the user doesent exist
            if (count($verification_result)=="0") {
                // create picture avatar link for database
                $img_link ="server/files/".$_FILES["user_picture"]["name"]; // upload and move file
                move_uploaded_file($_FILES['user_picture']['tmp_name'],$img_link);

                // hash and add salt in  password
                define("SALT","foo");
                $user_password =hash("sha256", SALT.$user_password);

                // SQL insert request
                $prepare=$pdo->prepare("INSERT INTO users (email, name, picture, password) VALUES(:email, :name, :picture, :password)");
                $prepare->bindValue("email", $user_mail);
                $prepare->bindValue("name", $user_name);
                $prepare->bindValue("picture", $img_link);
                $prepare->bindValue("password", $user_password);
                $prepare->execute();

                // empty all fields
                $_POST["user_name"] ="";
                $_POST["user_mail"] ="";
                $_POST["user_password"] ="";
                $_FILES["user_picture"] ="";
            }
            else {
                // if user already exist
                $error_users["error_already_registred"] ="User already registred";
                $_POST["user_name"] ="";
                $_POST["user_mail"] ="";
                $_POST["user_password"] ="";
                $_FILES["user_picture"] ="";
            }
        }
    }
    else {
        // if  $_POST is empty init it
        $_POST["user_name"] ="";
        $_POST["user_mail"] ="";
        $_POST["user_password"] ="";
        $_FILES["user_picture"] ="";
    }

    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    include 'views/partials/header.php';

 ?>
 <div class="container-content">
     <form class="user user_add" method="POST" enctype="multipart/form-data">
         <div class="user_picture <?=array_key_exists('error_img', $error_users) ? 'error' : '' ?>"><i class="fa fa-plus" aria-hidden="true"></i></div>
         <span><?= array_key_exists('error_img', $error_users) ? $error_users["error_img"] : ''?></span>
         <input type="file" name="user_picture" class="user_picture_field">
         <input type="text" name="user_name" value="<?=array_key_exists('error_name', $error_users)  ? 'Renseignez un nom' :$_POST["user_name"] ?>" placeholder="Nom"class="user_name <?=array_key_exists('error_name', $error_users)  ? 'error' :'' ?>">
         <input type="email" name="user_mail" value="<?=array_key_exists('error_mail', $error_users)  ? 'Renseignez un mail' :$_POST["user_mail"] ?>" placeholder="E-mail"class="user_mail <?=array_key_exists('error_mail', $error_users)  ? 'error' :'' ?>">
         <input type="password" name="user_password" placeholder="Mot de passe"value="" class="user_password <?=array_key_exists('error_password', $error_users)  ? 'error' :'' ?>">
         <input type="submit" name="" value="Ajouter" class="user_form_submit">
     </form>

     <?php foreach ($users as $key => $_user): ?>
        <div class="user">
            <div class="user_picture" style="background-image:url('<?=$_user->picture?>')"></div>

            <p class="user_name"><?= $_user->name ?></p>
            <p class="user_mail"><?= $_user->email ?></p>
            <p class="user_contributions"><?= $_user->contributions ?> contributions</p>
        </div>

     <?php endforeach; ?>
 </div>

 <?php
include 'views/partials/footer.php';
 ?>
