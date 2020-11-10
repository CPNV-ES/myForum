<?php ob_start(); ?>
<h1 class="text-center p-5">Create Reference</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
    <form action="/" method="get">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" id="url" name="url" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary">
        <input type="hidden" name="controller" value="reference">
        <input type="hidden" name="action" value="store">
    </form>
</div>