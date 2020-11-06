<?php ob_start(); ?>
<h1 class="text-center p-5">Show Reference <?= $id ?></h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Voulez-vous vraiment supprimer cette référence?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue-grey " data-dismiss="modal">Annuler</button>
                <a href="/?controller=reference&action=destroy&id=<?= $reference->id ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
            </div>
        </div>
    </div>
</div>


<div class="container">
<table class='table table-bordered table-sm col col-12'>
    <tbody>
        <tr>
            <th scope="col" class="stylish-color white-text col-fit-content">ID</th>
            <td><?= $reference->id ?></td>
        </tr>
        <tr>
            <th scope="col" class="stylish-color white-text col-fit-content">DESCRIPTION</th>
            <td><?= $reference->description ?></td>
        </tr>
        <tr>
            <th scope="col" class="stylish-color white-text col-fit-content">URL</th>
            <td><?= $reference->url ?></td>
        </tr>
    </tbody>
</table>
<a href="/?controller=reference&action=edit&id=<?= $reference->id ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Supprimer</button>
</div>

