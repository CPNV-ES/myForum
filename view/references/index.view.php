<!--Falsh message (Message stocker dans la question)-->
<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>
</div>
<a class="btn btn-primary" href="?controller=reference&action=create">Create</a>
<table id="references" class="table">
    <thead>
        <tr>
            <th>
                <h4>Description</h4>
            </th>
            <th>
                <h4>URL</h4>
            </th>
            <th>
                <h4>Action</h4>
            </th>
        </tr>
    </thead>
    <?php

    foreach ($references as $Key => $Value) : ?>
        <tbody>
            <tr>
                <td>
                    <?= $Value->description ?>
                </td>
                <td><a href="<?= $Value->url ?>"><?= $Value->url ?></a></td>
                <td>
                    <a class="btn btn-primary" href="?controller=Reference&action=show&id=<?= $Value->id ?>">Details</a>
                </td>
            </tr>
        </tbody>




    <?php endforeach; ?>
</table>
<?php


$content = ob_get_clean();

require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>