<?php ob_start(); ?>
<h1 class="text-center p-5">Themes list</h1>
<?php

$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>

<div class="container">
<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr>
            <th class="blue-gradient-rgba white-text">Name</th>
            <th scope="col" class="description-title"></th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($themes as $theme) {
    echo <<<EOD
    <tr>
        <th>
            $theme->description
        </th>
        <td scope="col" class="col-icons">
            <a href="$theme->url" target="_blank"><i class="fas fa-link"></i></a>
            <a href="?controller=theme&action=show&id=$theme->id"><i class="fas fa-eye"></i></a>
            <a href="?controller=theme&action=edit&id=$theme->id"><i class="fas fa-edit"></i></a>
        </td>
    </tr>
EOD;
}
?>

</tbody>
</table>
<a href="/?controller=theme&action=create"><button type="button" class="btn btn-primary">Nouveau</button></a>
</div>