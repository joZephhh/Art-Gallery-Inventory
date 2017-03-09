<?php
    $query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
    include 'views/partials/header.php';

 ?>
 <div class="container-content">
     <?php foreach ($users as $key => $_user): ?>
        <div class="user">
            <div class="user_picture"></div>
            <p class="user_name"><?= $_user->name ?></p>
            <p class="user_mail"><?= $_user->email ?></p>
            <p class="user_contributions"><?= $_user->contributions ?> contributions</p>
        </div>

     <?php endforeach; ?>
 </div>

 <?php
include 'views/partials/footer.php';
 ?>
