

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
                include "components/db.php";

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
            <form class="product"  action="#" method="POST">
                <div class="product_content">
                    <div class="product_actions">
                        <div class="action edit"><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                        <div class="action delete"><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                        <div class="action valid hide"><a href=""><i class="fa fa-check" aria-hidden="true"></i></a></div>
                    </div>
                    <div class="product_fiels_info">
                        <div class="product_title fields"><input type="text" name="title" value="Éternels Eclairs" disabled></div>
                        <div class="product_artist fields"><input type="text" name="artist" value="Vincent Van Gogh" disabled></div>
                        <div class="product_desc fields"><textarea name="name" disabled>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, unde.</textarea></div>
                    </div>
                    <div class="product_fiels_info second">
                        <div class="product_price fields"><input type="text" name="price" value="2300 $" disabled></div>
                        <div class="product_number fields"><input type="text" name="number" value="12 copies"  disabled></div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="assets/js/main.js" charset="utf-8"></script>
</body>
</html>
