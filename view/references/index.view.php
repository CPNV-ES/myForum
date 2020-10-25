<?php ob_start(); ?>
<div class="container">
    <h1 class="text-center p-5">Liste des réferences</h1>
    <?php foreach ($references as $reference) { ?>
        <div class="row text-center">
            <div class="col-2 text-right">
                <a class="blacklink m-2" href="<?= $reference->url ?>"><i class="fas fa-eye"></i></a>
                <a class="blacklink m-2" href="?controller=reference&action=edit&id=<?= $reference->id ?>"><i class="fas fa-edit"></i></a>
            </div>
            <div class="col-10 text-left">
                <?= $reference->description ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
