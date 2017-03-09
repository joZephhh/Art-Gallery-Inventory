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
            else {echo "supprimé";}
            ?>
        </span>
        <span>l'oeuvre <b><?= " ".$_log->picture ?></b>,</span>
        <span class="dates_to_convert"><?= $_log->date ?></span>
        </div>
    <?php endforeach; ?>
</div>
<!-- relative time -->
<script src="<?= URL ?>/assets/js/momentjs.js" charset="utf-8"></script>
<?php
// include footer
include 'views/partials/footer.php';
 ?>
