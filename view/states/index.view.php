<?php ob_start(); ?>
<h1 class="text-center p-5">List State</h1>

<?php foreach ($states as $state): ?>
<div class="container"
    <div class="row">
        <a id="<?= $state->id; ?>"><?= $state->name; ?></a>
    </div>
</div>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
