<?php
header("Content-Type : text/xls");
header("Content-Disposition: atachchement; filename='store.xls");
include 'config.php';
$request = $pdo->prepare("SELECT * FROM products");
$request-> execute();
$request_result = $request->fetchAll();
echo "ID;Nom de l'oeuvre;Artiste;Description;Prix;Nombre d'exemplaires; Date d'ajout";foreach ($request_result as $key => $el) {
             echo "\n".$el->id.';'.$el->name.';'.$el->artist.';'.$el->description.';'.$el->price.';'.$el->numberAvailable.';'.$el->date;
         }
?>
