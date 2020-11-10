<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>

<div class="container">
    <div class="row">
        <select class="browser-default custom-select">
            <option selected>---Tous---</option>
            <?php foreach ($opinionStates as $opinionState): ?>
                <option value="<?= $opinionState->name ?>"><?= $opinionState->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php foreach ($opinions as $opinion): ?>
        <div class="row">
            <div class="col-3">
                <?= $opinion->pseudo ?>
            </div>
            <div class="col-6">
                <?= $opinion->description ?>
            </div>
            <div class="col-3">
                <?= $opinion->name ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
