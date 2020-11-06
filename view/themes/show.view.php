<?php ob_start(); ?>
<h1 class="text-center p-5">Show Theme <?= $id ?></h1>

<table align="center">
    <tr>
        <td colspan="2"><input type="text" name="nameTheme" value="<?= $name ?>" disabled></td>
    </tr>
    <tr>
        <td><a class="button btn-danger" href="?controller=theme&action=destroy&id=<?= $id ?>">Supprimer</a></td>
        <td><a class="button btn-primary" href="?controller=theme&action=edit&id=<?= $id ?>">Modifier</a></td>
    </tr>
</table>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
