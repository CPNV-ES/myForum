<?php ob_start(); $i = 0; ?>
<h1 class="text-center p-5">List Theme</h1>
<table align="center" class="list" style="width: 25%; height: auto; text-align: left" >
    <?php while($theme = $allTheme[$i]){ ?>
        <tr>
            <td><?= $theme['name'] ?></td>
        </tr>
    <?php $i++; } ?>
</table>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
