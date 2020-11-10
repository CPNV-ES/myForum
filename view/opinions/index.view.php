<?php ob_start(); ?>

<h1 class="text-center p-5">Opinions</h1>
<div class="container">
    <table class="table table-striped">
        <thead class="bg-default text-white">
            <tr>
                <th scope="col">Auteur</th>
                <th scope="col">Opinion</th>
                <th scope="col">Etat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($opinions as $opinion):?>
                <tr>
                    <td><?= $opinion->use_pseudo ?></td>
                    <td><?= $opinion->description ?></td>
                    <td><?= $opinion->ops_name ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
