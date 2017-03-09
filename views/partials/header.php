<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Admin management</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container panel <?=$page?>">
        <div class="logs-panel">
                <?php 
                    echo '<pre>';
                    print_r($_FILES);
                    echo '</pre>';
                 ?>
        </div>
        <header>
            <div class="logo">
            </div>
            <div class="header_title">
                <span>Welcome back, <?= $_SESSION["username"]?></span>
            </div>
        </header>
        <ul class="inventory_menu">
            <li><a href="/store"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
            <li><a href="logs"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
            <li><a href="components/disconnect.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        </ul>
