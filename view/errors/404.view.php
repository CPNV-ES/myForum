<?php ob_start(); ?>
<h1 class="text-center p-5">404 - Page not found</h1>
<?php
$content = ob_get_clean();
require_once "view/layout.view.php";
?>
