<?php ob_start(); ?>
<h1 class="text-center p-5">Show Theme <?= $id ?></h1>

<table align="center">
    <tr>
        <td colspan="2"><input type="text" name="nameTheme" value="<?= $name ?>" disabled></td>
    </tr>
    <tr>
        <td><input class="button redButton" type="submit" value="Supprimer" formaction="?controller=theme&action=edit&id=<?= $id ?>"></td>
        <td><input class="button " type="submit" value="Modifier" formaction="?controller=theme&action=edit&id=<?= $id ?>"></td>
    </tr>
</table>


<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
