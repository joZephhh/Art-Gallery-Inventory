<?
$errors_list = array();
if (!empty($_POST)) {
    $login = trim($_POST["mail"]);
    $password = trim($_POST["password"]);

    if(empty($login)) {
        $errors_list["mail"] = "missing value";
    }
    if(empty($password)) {
        $errors_list["password"] = "missing value";
    }
    else if(empty($errors_list)){
        define("SALT","foo");
        $password =hash("sha256", SALT.$password);
        $prepare = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $prepare->bindValue('email',$login);
        $prepare->execute();
        $user = $prepare->fetch();

// Test password
if(gettype($user) ==="object" && $user->password == $password) {

$_SESSION["canAccess"]=true;
$_SESSION["username"] =$user->name;
$_SESSION["mail"] =$user->email;
header('Location: /store');
exit;
    }
else
    $errors_list["password_error"] = "login error";

}
}
else {
    $_POST["mail"]="";
    $_POST["password"]="";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Login - Inventory</title>
</head>
<body>
    <div class="background"></div>
    <div class="background_color"></div>

    <div class="container login">
        <form class="form" action="#" method="post">
            <i class="fa fa-sliders" aria-hidden="true"></i>
            <h3>Inventory gestion login</h3>
            <div class="form_row">
                <label for="mail">E-mail <span><?= array_key_exists('mail', $errors_list) ? '- Missing value' : ''  ?></span><span><?= array_key_exists('password_error', $errors_list) ? "- Erreur d'indentification" : ''  ?></span></label>
                <input type="email" name="mail" value="<?= $_POST["mail"] ?>" id="mail" placeholder="john.doe@gmail.com">
            </div>
            <div class="form_row">
                <label for="password">Password <span><?= array_key_exists('password', $errors_list) ? '- Missing value' : ''  ?></span><span><?= array_key_exists('password_error', $errors_list) ? "- Erreur d'indentification" : ''  ?></span></label>
                <input type="password" name="password" value="" id="password" placeholder="Only you know it.">
            </div>
            <input type="submit" name="" value="Login" class="form_submit">
        </form>
    </div>
</body>
</html>
