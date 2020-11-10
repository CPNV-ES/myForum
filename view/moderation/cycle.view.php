<?php ob_start(); ?>

<h1 class="text-center p-5">Opinions</h1>

<table id="opinions" class="table">
    <thead>
        <tr class="header">
            <th>
                <h4>de</h4>
            </th>
            <th>
                <h4>à</h4>
            </th>
            <th>
                <h4>Action</h4>
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
                    <a href="?controller=moderation&action=CycleDelete&id=<?$Value->id=?>"><i class="icon-trash"></i></a>
                </td>
            </tr>





        <?php endforeach; ?>
    </tbody>
</table>






<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>