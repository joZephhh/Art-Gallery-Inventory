<?php  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Admin management</title>
    <link rel="stylesheet" href="<?=URL?>/assets/css/style.css">
</head>
<body>
    <div class="container panel <?=$page?>">
        <header>
            <div class="logo">
            </div>
            <div class="header_title">
                <p>Welcome back, <?= $_SESSION["username"]?></p>
                <p><?=$page?></p>
                <a href="<?=URL?>/components/export_<?=$page?>.php" class="download_xls">Download <?=$page?> as .xls</a>

            </div>
        </header>
        <ul class="inventory_menu">
            <li><a href="<?=URL?>/store"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
            <li><a href="<?=URL?>/users"><i class="fa fa-users" aria-hidden="true"></i></a></li>
            <li><a href="<?=URL?>/logs"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
            <li><a href="<?=URL?>/components/disconnect.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        </ul>
