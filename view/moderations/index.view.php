<script src="view/moderations/moderationJs.js" defer></script>
<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>

<table id="moderation" class="table">
    <thead>
        <tr>
            <th>
                <h4>Pseudo</h4>
            </th>
            <th>
                <h4>Description</h4>
            </th>
            <th>
                <h4>Etat</h4>
            </th>
        </tr>
    </thead>
    <?php
    foreach ($moderations as $Key => $Value) : ?>
        <tbody>
            <tr>
                <td>
                    <?=$Value->pseudo ?>
                </td>
                <td><?=$Value->description ?></td>
                <td data-status="<?=$Value->opId ?>">
                    <?=$Value->name ?>
                </td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>