<?php ob_start(); ?>
<h1 class="text-center p-5">List Reference</h1>
<table class="table table-striped">
    <thead class="bg-default text-white">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Description</th>
            <th scope="col">Url</th>
            <th scope="col">a</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($references as $reference):?>
            <tr>
                <th scope="row"><?= $reference->id ?></th>
                <td><?= $reference->description ?></td>
                <td><?= $reference->url ?></td>
                <td>a</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
