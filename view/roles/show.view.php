<?php ob_start(); ?>
<h1 class="text-center p-5">Show Role <?= $id ?></h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";

echo $role->name;

?>

