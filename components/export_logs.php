<?php
header("Content-Type : text/xls");
header("Content-Disposition: atachchement; filename='logs.xls");
include 'config.php';
$request = $pdo->prepare("SELECT * FROM logs");
$request-> execute();
$request_result = $request->fetchAll();
echo "ID;Nom de l'utilisateur;Type de modification;Oeuvre concernée;Date";foreach ($request_result as $key => $el) {
             echo "\n".$el->id.';'.$el->name.';'.$el->type.';'.$el->picture.';'.$el->date;
         }
?>
