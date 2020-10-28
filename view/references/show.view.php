<?php ob_start(); ?>
<div class="row">
    <div class="bg-light col-2 border border-dark">Titre:</div>
    <div class="col-10"><?= $reference->description ?></div>
</div>
<div class="row">
    <div class="bg-light col-2 border border-dark">URL:</div>
    <div class="col-10"><?= $reference->url ?></div>
</div>
<div class="row m-3">
    <a href="?controller=Reference&action=destroy&id=<?= $reference->id ?>" class="btn btn-danger">Supprimer</a>
    <a href="?controller=Reference&action=edit&id=<?= $reference->id ?>" class="btn btn-primary">Modifier</a>
</div>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
