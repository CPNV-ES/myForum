<?php ob_start(); ?>
<h1 class="text-center p-5">Update Theme <?= $id ?></h1>
<form method="post" action="?controller=theme&action=update&id=<?= $id ?>">
    <table align="center">
        <tr>
            <td colspan="2"><input type="text" name="nameTheme" value="<?= $name ?>" ></td>
        </tr>
        <tr>
            <td><a class="button btn-primary" href="?controller=theme&action=show&id=<?= $id ?>">Annuler</a></td>
            <td><input type="submit" class="button btn-green" value="Enregistrer"></td>
        </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>