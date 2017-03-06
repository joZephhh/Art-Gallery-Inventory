<?php
    $error_product=array(); // init errors
    $error_add_product=array(); // init errors
    if(!empty($_POST)) {
        if($_POST["type"] === "add") {
            include 'components/add_products.php';
        }
        else if($_POST["type"] === "edit") {
            include 'components/edit_products.php';
        }
        else if ($_POST["type"] === "delete") {
            include 'components/delete_products.php';
        }
    }
    else {
        // empty the $_POST array
        $_POST["type"]="";
        $_POST["name"]="";
        $_POST["artist"]="";
        $_POST["description"]="";
        $_POST["price"]="";
        $_POST["numberAvailable"]="";
        $_FILES["img"]="";

        // define id as none to avoid errors further
        $error_product["id"]="none";
    }

    // retrieve all products
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
            print_r($_FILES);
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
            <!-- Show when user try to edit 2 things -->
            <div class="modal">
                <p><i class="fa fa-exclamation" aria-hidden="true"></i></p>
                <p>Vous ne pouvez qu'effectuer une seule action à la fois.</p>
                <div class="modal_button">
                    <a href="#">OK</a>
                </div>
            </div>
            <?

            // declaration to avoid notice undefined variables
            $error_name =false;
            $error_artist =false;
            $error_description =false;
            $error_img =false;
            $error_price =false;
            $error_number =false;
            $edit = false;
            $add = false;
            $isError = false;



            // if the form submited is for add products
            if($_POST["type"]=="add") {
                $add = true;
                if (array_key_exists('error_name', $error_add_product)) {$error_name = true;}
                if (array_key_exists('error_artist', $error_add_product)) {$error_artist = true;}
                if (array_key_exists('error_description', $error_add_product)) {$error_description = true;}
                if (array_key_exists('error_img', $error_add_product)) {$error_img = true;}
                if (array_key_exists('error_price', $error_add_product)) {$error_price = true;}
                if (array_key_exists('error_numberAvailable', $error_add_product)) {$error_number = true;}
            }
            // the form submited is for edit products
            else if ($_POST["type"]=="edit") {
                $edit = true;
                if (array_key_exists('error_name', $error_product)) {$error_name = true;}
                if (array_key_exists('error_artist', $error_product)) {$error_artist = true;}
                if (array_key_exists('error_description', $error_product)) {$error_description = true;}
                if (array_key_exists('error_img', $error_product)) {$error_img = true;}
                if (array_key_exists('error_price', $error_product)) {$error_price = true;}
                if (array_key_exists('error_numberAvailable', $error_product)) {$error_number = true;}
            }?>

            <form class="product add_form" action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="add">
                    <div class="product_content editable">
                        <div class="product_mask <?= !empty($error_add_product) ? 'hide' : ''?>">
                            <a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                        </div>
                        <div class="product_actions">
                            <div class="action valid <?= !empty($error_add_product)  ? '' : 'hide'?>"><a href=""><i class="fa fa-check" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product_fields_info">
                                <div class="product_title fields">
                                    <input type="text" name="name"  value="<?=  $add && $error_name ? 'Missing value' : $add ? $_POST["name"] :'' ?>" placeholder="Nom" style="<?= $add && $error_name  ? 'background:red;' : '' ?>">
                                </div>
                                <div class="product_artist fields">
                                    <input type="text" name="artist" value="<?=$add &&  $error_artist ? 'Missing value' : $add ? $_POST["artist"] : '' ?>"  placeholder="Artiste" style="<?= $add && $error_artist ? 'background:red;' : '' ?>">
                                </div>
                                <div class="product_desc fields">
                                    <textarea name="description"  placeholder="Description" style="<?= $add && $error_description ? 'background:red;' : '' ?>" ><?= $add && $error_description ? 'Missing value' : $add ? $_POST["description"] :'' ?></textarea>
                                </div>
                                <div class="product_image fields">
                                    <input type="file" name="img" value="" style="<?= $add && $error_img ? 'background:red;' : '' ?>">
                                    <span><?=$add &&  $error_img ? 'Missing value' : $add ? $_FILES["img"]["name"] : '' ?></span>
                                </div>
                            </div>
                            <div class="product_fields_info second">
                                <div class="product_price fields">
                                    <input type="text" name="price" value="<?= $add && $error_price ? 'Missing value' : $add ? $_POST["price"] : '' ?>"  placeholder="Prix"  style="<?= $add && $error_price ? 'background:red;' : '' ?>">
                                </div>
                                <div class="product_number fields">
                                    <input type="text" name="numberAvailable" value="<?= $add && $error_number ? 'Missing value' : $add ? $_POST["numberAvailable"] : '' ?>"  placeholder="Nombre de copies" style="<?= $add && $error_number ? 'background:red;' : '' ?>">
                                </div>
                            </div>

                    </div>
            </form>
<?php
    foreach ($products as $key => $_product) {
        if ($edit) {
            if($error_product["id"] == $_product->id) {
                $isError =true;
            }
            else {
                $isError = false;
            }
        }
?>
<form class="product"  action="#" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="type" value="edit" class="send_type">
    <input type="hidden" name="id" value="<?= $_product->id ?>">
    <div class="product_content <?= $isError ? 'editable' : '' ?>" style="background-image:url('server/files/<?= $_product->img ?>')">
        <div class="product_actions">
            <div class="action edit"><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
            <div class="action delete"><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></div>
            <div class="action valid hide"><a href=""><i class="fa fa-check" aria-hidden="true"></i></a></div>
        </div>
        <div class="product_fields_info">
            <div class="product_title fields">
                <input type="text" name="name"  value="<?=  $edit && $error_name && $isError ? 'Missing value' : $_product->name ?>"  style="<?= $edit && $error_name && $isError ? 'background:red;' : '' ?>"  disabled>
            </div>
            <div class="product_artist fields">
                <input type="text" name="artist" value="<?=   $edit && $error_artist && $isError  ? 'Missing value' : $_product->artist ?>"  style="<?=  $edit && $error_artist && $isError ? 'background:red;' : '' ?>" disabled>
            </div>
            <div class="product_desc fields">
                <textarea name="description" style="<?=  $edit && $error_description && $isError  ? 'background:red;' : '' ?>" disabled><?= $edit && $error_description && $isError  ? 'Missing value' : $_product->description ?></textarea>
            </div>
            <span class="product_image_name">Image : <?= $edit && $error_img && $isError  ? 'Missing value' : $_product->img ?></span>
            <div class="product_image fields">
                <input type="file" name="img" value="" style="<?= $edit && $error_img ? 'background:red;' : '' ?>" disabled>
            </div>
        </div>
        <div class="product_fields_info second">
            <div class="product_price fields">
                <input type="text" name="price" value="<?= $edit && $error_price && $isError ? 'Missing value' : $_product->price .' €'?>" style="<?= $edit && $error_price && $isError ? 'background:red;' : '' ?>" disabled>
            </div>
            <div class="product_number fields">
                <input type="text" name="numberAvailable" value="<?= $edit && $error_number && $isError ? 'Missing value' : $_product->numberAvailable . ' copies' ?>"  style="<?=$edit && $error_number && $isError ? 'background:red;' : '' ?>" disabled>
            </div>
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
