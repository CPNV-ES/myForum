<script src="./scripts/sort.js" defer></script>

<?php ob_start(); ?>

<h1 class="text-center p-5">Opinions</h1>

<table id="opinions" class="table">
    <thead>
        <tr class="header">
            <th>
                <h4>Utilisateur</h4>
            </th>
            <th>
                <h4>Opinion</h4>
            </th>
            <th>
                <h4>filtre</h4>
                <select id="filter">
                    <option>--Tout--</option>
                    <?php foreach ($stateType as $Key => $Value) : ?>
                        <option><?=$Value->name?></option>
                    <?php endforeach; ?>
                </select>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($opinions as $Key => $Value) : ?>

            <tr>
                <td>
                    <?= $Value->username ?>
                </td>
                <td><?= $Value->description ?></td>
                <td>
                    <?= $Value->state_name ?>
                </td>
            </tr>





        <?php endforeach; ?>
    </tbody>
</table>






<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>