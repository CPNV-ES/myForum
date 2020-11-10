<script src="view/references/referencelist.js" defer></script>

<?php ob_start(); ?>
<script src="../../controller/ReferenceController.js" defer></script>

<h1 class="text-center p-5">List Reference</h1>
<div class="container">
    <table class="table table-striped">
        <thead class="bg-default text-white">
            <tr>
                <th scope="col">Description</th>
                <th class="text-right" scope="col">
                    <a href="?controller=reference&action=create" class="text-white"><i class="fas fa-plus fa-fw"></i></a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($references as $reference):?>
                <tr>
                    <td><?= $reference->description ?></td>
                    <td class="text-right text-nowrap">
                        <a class="d-none" href="<?= $reference->url ?>"><i class="fas fa-eye fa-fw mr-2"></i></a>
                        <a class="d-none" href="?controller=reference&action=edit&id=<?= $reference->id ?>"><i class="fas fa-pen fa-fw"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>
