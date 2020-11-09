<?php ob_start(); ?>
<h1 class="text-center p-5">Create State</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
    <form action="/" method="get">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="controller" value="state">
        <input type="hidden" name="action" value="store">
    </form>
</div>