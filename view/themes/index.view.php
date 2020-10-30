<?php ob_start(); ?>
<h1 class="text-center p-5">List Theme</h1>

<?php foreach ($themes as $theme): ?>
<div class="container"
    <div class="row">
        <a id="<?= $theme->id; ?>"><?= $theme->name; ?></a>
    </div>
</div>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
