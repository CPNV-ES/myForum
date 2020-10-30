<?php 
    ob_start(); 
?>

<h1 class="text-center p-5">List Theme</h1>
<h2> Displaying themes list </h2>

<?php
$content = ob_get_clean();

//require('../../model/Theme.php');

//$t = new Theme;

require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";

?>
