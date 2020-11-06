<?php ob_start(); $i = 0; ?>
<script src="view/themes/themelist.js"></script>
<h1 class="text-center p-5">List Theme</h1>
<table align="center" class="list" >
    <tr>
        <td class="ListButton"><a class="button" href="?controller=theme&action=create">Create</a></td><td></td>
    </tr>
    <?php while($theme = $allTheme[$i]){
        $nbTheme = count($allTheme);
        $i++;
        if($nbTheme == $i){
            break;
        }?>
        <tr>
            <td id="divIcons"><a href="?controller=theme&action=show&id=<?= $theme['id'] ?>"><span class="fas fa-edit"></span></a></td>
            <td class="divtitle"><?= $theme['name'] ?></td>
        </tr>
    <?php
         } ?>
</table>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
