<?php ob_start(); ?>
<form action="?controller=Reference&action=store" method="post">
    <?php require ("form_body.view.php") ?>
    <div class="row m-3">
        <button class="btn btn-success">Enregistrer</button>
        <a href="?controller=Reference&action=show&id=<?= $reference->id ?>" class="btn btn-primary">Annuler</a>
    </div>
</form>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
