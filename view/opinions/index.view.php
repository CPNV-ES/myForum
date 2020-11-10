<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>
<div class="row text-center">
    <div class="col-12 text-right">
        Filtre :
        <form>
            <select name="nom" size="1">
                <option selected>--- Tous ---
                <?php foreach ($opinionstates as $opinionstate) {   ?>
                    <option><?= $opinionstate->name ?>
                <?php } ?>
            </select>
        </form>
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
    <div class="row text-center">
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
