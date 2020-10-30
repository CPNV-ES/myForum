<?php
    ob_start();
?>

<h1 class="text-center p-5">Home</h1>

<?php
    $content = ob_get_clean();
    require_once "layout.view.php";
?>