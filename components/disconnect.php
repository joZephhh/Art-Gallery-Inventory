<?php
    session_start(); // retrieve session
    session_destroy(); // .... and destroy it
    header("location: /login"); // relocate user in login
    exit;

 ?>
