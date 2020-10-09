<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>
<?php
echo('<a class="btn btn-primary" href="?controller=reference&action=create">Create</a>');

foreach($references as $Key => $Value)
{
    echo('<div id="reference" style="padding-bottom:10px;">');
    echo('<h1>'.$Value->description.'</h1>');
    echo('</br><a href="'.$Value->url.'">'.$Value->url.'</a>');
    echo('<a class="btn btn-primary" href="?controller=reference&action=edit&id='.$Value->id.'">Edit</a>');
    echo('<a class="btn btn-primary" href="?controller=reference&action=delete&id='.$Value->id.'">Delete</a>');
    echo('</div>');
}

?>


<?php
$content = ob_get_clean();

require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
