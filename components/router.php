<?php

 $q = isset($_GET["q"]) ? $_GET["q"]  : '';

session_start();
 if ($q == '' || $q == 'login') {
         $page = 'login';
     }
     else if ($q == 'store') {
         if (isset($_SESSION["canAccess"])) {
              $page = 'store';
         }
         else {
            header('Location: login');
         }

     }
     else {
         $page = '404';
     }

     include 'views/pages/'.$page.'.php';
