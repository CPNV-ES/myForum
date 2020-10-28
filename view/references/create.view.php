<?php ob_start(); ?>
<form action="?controller=Reference&action=store" method="post">
    <div class="row">
        <div class="bg-light col-2 border border-dark">Titre:</div>
        <input type="text" name="description" class="col-10" value="<?= $reference->description ?>" />
    </div>
    <div class="row">
        <div class="bg-light col-2 border border-dark">URL:</div>
        <input type="url" name="url" class="col-10" value="<?= $reference->url ?>" />
    </div>
    <div class="row m-3">
        <button class="btn btn-success">Enregistrer</button>
        <a href="?controller=Reference&action=show&id=<?= $reference->id ?>" class="btn btn-primary">Annuler</a>
    </div>
</form>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
