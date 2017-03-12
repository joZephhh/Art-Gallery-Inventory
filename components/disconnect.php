<?php
    include "config.php";
    session_start(); // retrieve session
    session_destroy(); // .... and destroy it
    header("location: ".URL."/login"); // relocate user in login
    exit;

 ?>
