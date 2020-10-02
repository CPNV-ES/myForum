<?php ob_start(); ?>
<h1>404 - Page not found</h1>
<?php
$content = ob_get_clean();
require_once "view/layout.view.php";
?>
