<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col" class="blue-gradient-rgba white-text">Description</th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($references as $reference) {
    echo <<<EOD
    <tr>
        <th class="col-md-1 col-icons">
            <a href="$reference->url" target="_blank"><i class="fas fa-link"></i></a>
            <a href="?controller=reference&action=show&id=$reference->id"><i class="fas fa-eye"></i></a>
            <a href="?controller=reference&action=edit&id=$reference->id"><i class="fas fa-edit"></i></a>
        </th>
        <td class="th-lg">
            $reference->description
        </td>
    </tr>
EOD;
}
?>

    </tbody>
</table>
<a href="/?controller=reference&action=create"><button type="button" class="btn btn-primary">Nouveau</button></a>
</div>