<?php ob_start(); ?>
<div class="container">
    <h1 class="text-center p-5">Liste des réferences</h1>
    <?php foreach ($references as $reference) { ?>
        <div class="row text-center">
            <a href="<?= $reference->url ?>"><?= $reference->description ?></a>
        </div>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
