<?php

// retrive the query
 $q = isset($_GET["q"]) ? $_GET["q"]  : '';

//init session
session_start();

// compare queries with pages
 if ($q == '' || $q == 'login') {
         $page = 'login';
     }
else if ($q == 'store') {
         // if user has been logged
     if (isset($_SESSION["canAccess"])) {
              $page = 'store';
         }
    else {
            header('Location: login');
    }

}
elseif ($q == "users") {
    if (isset($_SESSION["canAccess"])) {
             $page = 'users';
        }
   else {
           header('Location: login');
    }
}
else if ($q == 'logs') {
         $page = 'logs';
}
else {
         $page = '404';
 }

// dynamic include with query
include 'views/pages/'.$page.'.php';
