<?php ob_start(); ?>
<h1 class="text-center p-5">Show Reference <?= $id ?></h1>

<div class="container">
    <div class="form-row">
        <div class="col">
            <h2><?= $reference->description ?></h2>
            <a href="" class="btn btn-blue">Modifier</a>
            <a href="?controller=reference&action=destroy&id=<?= $id ?>" class="btn btn-danger">Supprimer</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
