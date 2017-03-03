<?php
    include "components/db.php";
    $error_product=array();
    if(!empty($_POST)) {
        if($_POST["type"] === "edit") {
            include 'components/edit_products.php';
        }
        else if ($_POST["type"] === "delete") {
            include 'components/delete_products.php';
        }
    }

    $query = $pdo->query('SELECT * FROM products');
    $products = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Admin management</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container panel">
        <div class="logs-panel">
            <?php
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
             ?>
        </div>
        <header>
            <div class="logo">
            </div>
            <div class="header_title">
                <span>Welcome back, Joseph</span>
            </div>
        </header>
        <ul class="inventory_menu">
            <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        </ul>
        <div class="container-content">
            <div class="modal">
                <p><i class="fa fa-exclamation" aria-hidden="true"></i></p>
                <p>Vous ne pouvez qu'effectuer une seule action à la fois.</p>
                <div class="modal_button">
                    <a href="#">OK</a>
                </div>
            </div>
<?php
    foreach ($products as $key => $_product) {
?>
<form class="product"  action="#" method="POST">
    <input type="hidden" name="type" value="edit" class="send_type">
    <input type="hidden" name="id" value="<?= $_product->id ?>">
    <div class="product_content <?= $error_product["id"] == $_product->id ? 'editable' : '' ?>">
        <div class="product_actions">
            <div class="action edit"><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
            <div class="action delete"><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></div>
            <div class="action valid hide"><a href=""><i class="fa fa-check" aria-hidden="true"></i></a></div>
        </div>
        <div class="product_fields_info">
            <div class="product_title fields"><input type="text" name="name"  value="<?=  array_key_exists('error_name', $error_product) && $error_product["id"] == $_product->id ? 'Missing value' : $_product->name ?>"  style="<?= array_key_exists('error_name', $error_product) && $error_product["id"] == $_product->id ? 'background:red;' : '' ?>"  disabled></div>
            <div class="product_artist fields"><input type="text" name="artist" value="<?=  array_key_exists('error_artist', $error_product) && $error_product["id"] == $_product->id  ? 'Missing value' : $_product->artist ?>"  style="<?= array_key_exists('error_artist', $error_product) && $error_product["id"] == $_product->id ? 'background:red;' : '' ?>" disabled></div>
            <div class="product_desc fields"><textarea name="description" style="<?= array_key_exists('error_description', $error_product) && $error_product["id"] == $_product->id  ? 'background:red;' : '' ?>" disabled><?= array_key_exists('error_description', $error_product) && $error_product["id"] == $_product->id  ? 'Missing value' : $_product->description ?></textarea></div>
        </div>
        <div class="product_fields_info second">
            <div class="product_price fields"><input type="text" name="price" value="<?= array_key_exists('error_price', $error_product) && $error_product["id"] == $_product->id ? 'Missing value' : $_product->price .' €'?>" style="<?= array_key_exists('error_price', $error_product) && $error_product["id"] == $_product->id ? 'background:red;' : '' ?>"disabled></div>
            <div class="product_number fields"><input type="text" name="numberAvailable" value="<?= array_key_exists('error_numberAvailable', $error_product)  && $error_product["id"] == $_product->id ? 'Missing value' : $_product->numberAvailable . ' copies' ?>"  style="<?= array_key_exists('error_numberAvailable', $error_product) && $error_product["id"] == $_product->id  ? 'background:red;' : '' ?>" disabled></div>
        </div>
    </div>
</form>
<?php
} ?>


        </div>
    </div>
    <script src="assets/js/main.js" charset="utf-8"></script>
</body>
</html>
