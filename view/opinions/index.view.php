<script src="view/opinions/opinionlist.js" defer></script>

<?php ob_start(); ?>

<h1 class="text-center p-5">Opinions</h1>
<div class="container">
    <!-- All opinions -->
    <table class="table table-striped">
        <thead class="bg-default text-white">
            <tr>
                <th scope="col">Auteur</th>
                <th scope="col">Opinion</th>
                <th scope="col">
                    <!-- Dropdown opinions states -->
                    <a class=" dropdown-toggle mr-4"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Etat</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item sort-opinion-state" href="#">---Tous---</a>
                        <?php foreach ($opinionstates as $opinionstate):?>
                            <a class="dropdown-item sort-opinion-state" href="#"><?= $opinionstate->name ?></a>
                        <?php endforeach; ?>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($opinions as $opinion):?>
                <tr>
                    <td><?= $opinion->use_pseudo ?></td>
                    <td><?= $opinion->description ?></td>
                    <td class="opinion-state"><?= $opinion->ops_name ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
