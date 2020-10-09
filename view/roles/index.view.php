<?php ob_start(); ?>
<h1 class="text-center p-5">List Role</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
<table class='table table-bordered table-striped table-sm col col-12'>
    <thead class="blue-gradient-rgba white-text">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($roles as $role) {
    echo "<tr>";
    echo "<th scope='row'>" . $role->id . "</th>";
    echo "<td>";
    echo "<a href='?controller=role&action=show&id=" . $role->id . "'>";
    echo $role->name;
    echo "</td>";
    echo "</a>";
    echo "</tr>";
}
?>

    </tbody>
</table>
</div>