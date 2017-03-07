<?php
    $id = (int)$_POST["id"]; // retrieve ID for identify what element we need to delete
    $name = $_POST["name"]; // retrieve name for logs

    // SQL delete request
    $prepare = $pdo->prepare("DELETE FROM products WHERE id =  :id");
    //  Bind values and execute
    $prepare->bindParam('id', $id);
    $prepare->execute();

    // Set logs
    $logs = $pdo-> prepare("INSERT INTO logs (picture, type) VALUES (:picture, :type)");
    $logs-> bindValue("picture", $name);
    $logs-> bindValue("type", $_POST["type"]);
    $exec_logs = $logs->execute();

 ?>
