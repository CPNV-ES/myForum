<?php ob_start(); ?>
<h1 class="text-center p-5">List Role</h1>

<?php foreach ($roles as $role): ?>
<div class="container"
    <div class="row">
        <a id="<?= $role->id; ?>"><?= $role->name; ?></a>
    </div>
</div>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
