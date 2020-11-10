<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>
<link rel="stylesheet" href="./view/opinions/stlye.css">
<table class="table">

    <thead>
    <tr>
        <th></th>
        <th></th>
        <th>Filtre:<br>
    <SELECT name="state" class="state-select" id="state-select">
        <OPTION value="Tous">---- Tous ----</OPTION>
        <OPTION value="En Modification">En Modification</OPTION>
        <OPTION value="En revue">En revue</OPTION>
        <OPTION value="Nouveau">Nouveau</OPTION>
        <OPTION value="Obsolet">Obsolet</OPTION>
        <OPTION value="Publié">Publié</OPTION>
        <OPTION value="Rejeté">Rejeté</OPTION>
    </SELECT>
    </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($opinions as $Key => $Value): ?>
        <tr class="actual-state" id="<?= $Value->state ?>">
            <td>
                <?= $Value->username ?>
            </td>
            <td><?= $Value->description ?></td>
            <td>
                <?= $Value->state ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script src="./view/opinions/sort.js"></script>


<?php
$content = ob_get_clean();

require_once "./view/layout.view.php";
?>

