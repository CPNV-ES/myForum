<script src="view/opinions/ChangeState.js" defer></script>

<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>
<div class="row text-center">
    <div class="col-12 text-right">
            <label for="OpinionState">Filtre :</label>
            <select id="OpinionState" name="OpinionState" size="1">
                <option selected>--- Tous ---</option>
                <?php foreach ($opinionstates as $opinionstate) {   ?>
                    <option value="<?= str_replace(" ", "_", $opinionstate->name) ?>"><?= $opinionstate->name  ?></option>
                <?php } ?>
            </select>
    </div>
</div>

<div class="row text-center">
    <div class="col-2 text-left">
        <h4><b>Auteur</b></h4>
    </div>
    <div class="col-8 text-left">
        <h4><b>Opinion</b></h4>
    </div>
    <div class="col-2 text-left">
        <h4><b>Etat</b></h4>
    </div>
</div>
<?php foreach ($opinions as $opinion) { ?>
    <div id="<?= str_replace(" ", "_", $opinion->name)  ?>" class="row text-center">
        <div class="col-2 text-left">
            <?= $opinion->pseudo ?>
        </div>
        <div class="col-8 text-left">
            <?= $opinion->description ?>
        </div>
        <div class="col-2 text-left">
            <?= $opinion->name ?>
        </div>
    </div>
<?php } ?>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
