<?php ob_start(); ?>
<h1 class="text-center p-5">Update : <?= $reference->description ?></h1>

<form method="POST" action="?controller=reference&action=update&id=<?=$_GET['id']?>">
    <input class="form-control" name = "description" id="description" type="text" placeholder="Description" value="<?=$reference->description?>"/>
    <input class="form-control" name = "url" id="url" type="text" placeholder="URL" value="<?=$reference->url?>"/>
    <input class="btn btn-success" type="submit" value="Modifier"/>
</form>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
