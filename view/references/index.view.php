<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>

<?php foreach ($references as $reference): ?>
<div class="container"
    <div class="row">
        <a id="<?= $reference->id; ?>"><?= $reference->description; ?></a>
    </div>
</div>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
