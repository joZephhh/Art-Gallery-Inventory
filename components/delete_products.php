<?php
    $id = (int)$_POST["id"];
    $prepare = $pdo->prepare("DELETE FROM products WHERE id =  :id");
    $prepare->bindParam('id', $id);
    $prepare->execute();

 ?>
