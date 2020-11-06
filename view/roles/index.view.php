<?php ob_start(); ?>
<h1 class="text-center p-5">List Role</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr>
            <th scope="col" class="blue-gradient-rgba white-text">Nom</th>
            <th scope="col" class="description-title"></th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($roles as $role) {
    echo <<<EOD
    <tr>
        <th class="th-lg">
            $role->name
        </th>
        <td scope="col" class="col-icons">
            <a href="?controller=role&action=show&id=$role->id"><i class="fas fa-eye"></i></a>
            <a href="?controller=role&action=edit&id=$role->id"><i class="fas fa-edit"></i></a>
        </td>
    </tr>
EOD;
}
?>

    </tbody>
</table>
<a href="/?controller=role&action=create"><button type="button" class="btn btn-primary">Nouveau</button></a>
</div>