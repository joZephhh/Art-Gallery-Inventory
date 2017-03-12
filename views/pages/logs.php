<?php
// retrieve all events
$query = $pdo->query('SELECT * FROM logs');
$logs_data= $query->fetchAll();

// include header
include 'views/partials/header.php';
 ?>
<div class="container-content">
    <!-- Foreach logs, show it with relative colors-->
    <?php foreach ($logs_data as $key => $_log): ?>
        <div class="log <?= $_log->type ?>">
        <span><?= $_log->name ?> a
            <?
            if ($_log->type === 'edit') {echo "modifié";}
            else if ($_log->type === 'add') {echo "ajouté";}
            else if ($_log->type === 'add_user') {echo "ajouté l'utilisateur";}
            else if ($_log->type === 'delete') {echo "supprimé";}
            ?>
        </span>
        <span><?= $_log->type === 'add_user' ? '' :"l'oeuvre"?> <b><?= " ".$_log->picture ?></b>,</span>
        <span class="dates_to_convert"><?= $_log->date ?></span>
        </div>
    <?php endforeach; ?>
</div>

<?php
// include footer
include 'views/partials/footer.php';
 ?>
