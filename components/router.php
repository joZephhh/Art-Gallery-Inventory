<?php

 $q = isset($_GET["q"]) ? $_GET["q"]  : '';


 if ($q == '') {
         $page = 'login';
     }
     else if ($q == 'store') {
         $page = 'store';
     }
     else {
         $page = '404';
     }

     include 'views/pages/'.$page.'.php';
