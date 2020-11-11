<script src="view/opinions/opinions.js" defer></script>
<?php ob_start(); ?>
<h1 class="text-center pb-2">Opinions</h1>
<div class="row p-2 justify-content-center">
    <div class="col-2 offset-6">
        Filtre:<br>
        <select id="selState">
            <option value="0">--- Tous ---</option>
            <?php foreach ($allstates as $state): ?>
                <option value="<?= $state->id ?>"><?= $state->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<?php foreach ($opinions as $opinion) : ?>
    <div class="row divOp" data-opstateid="<?= $opinion->opinionstate_id ?>">
        <div class="col-2 text-left">
            <?= $opinion->author ?>
        </div>
        <div class="col-6 text-left">
            <?= $opinion->description ?>
        </div>
        <div class="col-2 text-left">
            <?= $opinion->state ?>
        </div>
    </div>
<?php endforeach; ?>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
