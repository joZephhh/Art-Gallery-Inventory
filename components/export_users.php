<?php
header("Content-Type : text/xls");
header("Content-Disposition: atachchement; filename='users.xls");
include 'config.php';
$request = $pdo->prepare("SELECT * FROM users");
$request-> execute();
$request_result = $request->fetchAll();
echo "ID;E-mail;Nom;Nombre de contributions";foreach ($request_result as $key => $el) {
             echo "\n".$el->id.';'.$el->email.';'.$el->name.';'.$el->contributions;
         }
?>
