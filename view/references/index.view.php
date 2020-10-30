<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>

<div class="container">
    <?php foreach ($references as $reference): ?>
        <div class="row">
            <div class="col-3">
                <i class="fas fa-eye mr-4"></i>
                <i class="fas fa-search-plus"></i>
            </div>
            <div class="col-9">
                <a id="<?= $reference->id; ?>"><?= $reference->description; ?></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
