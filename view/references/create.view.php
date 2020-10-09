<?php ob_start(); ?>
<h1 class="text-center p-5">Create Reference</h1>

<form method="POST" action="?controller=reference&action=store">
    <input name = "description" id="description" type="text" placeholder="Description"/>
    <input name = "url" id="url" type="text" placeholder="URL"/>
    <input type="submit" value="Create"/>
</form>




<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
