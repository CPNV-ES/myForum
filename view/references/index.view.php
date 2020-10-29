<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>
<?php
echo ('<a class="btn btn-primary" href="?controller=reference&action=create">Create</a>');

foreach ($references as $Key => $Value) : ?>

    <table class="table">

        <thead>
            <tr>
                <th>Description</th>
                <th>URL</th>
                <th style="float:right;">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?= $Value->description ?>
                </td>
                <td><a href="<?=$Value->url?>"><?= $Value->url ?></a></td>
                <td style="float:right;">
                    <a class="btn btn-primary" href="?controller=Reference&action=show&id=<?= $Value->id ?>">Details</a>
            </tr>
        </tbody>
    </table>



<?php endforeach;


$content = ob_get_clean();

require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>