<script src="view/references/referencelist.js" defer></script>

<?php ob_start(); ?>
<h1 class="text-center p-5">Réferences</h1>
<?php foreach ($references as $reference) { ?>
    <div id="ref<?= $reference->url ?>" data-id="<?= $reference->id ?>" class="row text-center divtitle">
        <div class="col-2 text-right">
            <div id="divIcons<?= $reference->id ?>" class="d-none">
                <a class="blacklink m-2" href="<?= $reference->url ?>"><i class="fas fa-eye"></i></a>
                <a class="blacklink m-2" href="?controller=reference&action=show&id=<?= $reference->id ?>"><i class="fas fa-search-plus"></i></a>
            </div>
        </div>
        <div class="col-10 text-left">
            <?= $reference->description ?>
        </div>
    </div>
<?php } ?>
<div class="row m-3">
    <a href="?controller=Reference&action=create" class="btn btn-primary">Ajouter</a>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
