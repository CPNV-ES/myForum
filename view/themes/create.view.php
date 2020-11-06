<?php ob_start(); ?>
<h1 class="text-center p-5">Create Theme</h1>
<form method="post" action="?controller=theme&action=store">
    <table align="center">
        <tr>
            <td><input type="text" name="nameTheme"></td>
        </tr>
        <tr>
            <td><input class="button" type="submit"></td>
        </tr>
    </table>
</form>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
