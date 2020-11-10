<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>

<table class="table">

    <thead>
    <tr>
        <th></th>
        <th></th>
        <th>Filtre:</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($opinions as $Key => $Value): ?>
        <tr>
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


<?php
$content = ob_get_clean();

require_once "./view/layout.view.php";
?>

