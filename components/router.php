<?php

// retrive the query
 $q = isset($_GET["q"]) ? $_GET["q"]  : '';

//init session
session_start();

// compare queries with pages
 if ($q == '') {
    if (!isset($_SESSION["canAccess"])) {
        header('Location: login'); // redirect to login if user is not logged
    }
    else {
        header('Location: store'); // redirect to store if user is logged
    }
}
else if($q == 'login') {
    $page= 'login';
}
else if ($q == 'store') {

    if (isset($_SESSION["canAccess"])) {
        $page = 'store'; // accept to load store page if user is logged
     }
    else {
        header('Location: login'); // if user if not logged redirect to login page
    }
    
}
else if ($q == "users") {

    if (isset($_SESSION["canAccess"])) {
        $page = 'users'; // accept to load users page if user is logged
    }
   else {
       header('Location: login'); // if user if not logged redirect to login page
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
