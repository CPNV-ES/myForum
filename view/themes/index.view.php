<?php ob_start(); $i = 0; ?>
<h1 class="text-center p-5">List Theme</h1>
<table align="center" class="list" >
    <tr>
        <td class="ListButton"><a class="button" href="?controller=theme&action=create">Create</a></td><td></td>
    </tr>
    <?php while($theme = $allTheme[$i]){ ?>
        <tr id="animation">
            <td class="ListButton"><span class="fas fa-edit"></span></td>
            <td><?= $theme['name'] ?></td>
        </tr>
    <?php $i++; } ?>
</table>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
