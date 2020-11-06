<?php ob_start(); ?>
<h1 class="text-center p-5">Show Theme <?= $id ?></h1>
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
                <a href="/?controller=theme&action=destroy&id=<?= $theme->id ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
            </div>
        </div>
    </div>
</div>


<div class="container">
<table class='table table-bordered table-sm col col-12'>
    <tbody>
        <tr>
            <th class="col-md-1 stylish-color white-text">ID</th>
            <td><?= $theme->id ?></td>
        </tr>
        <tr>
            <th class="col-md-1 stylish-color white-text">NAME</th>
            <td><?= $theme->name ?></td>
        </tr>
    </tbody>
</table>
<a href="/?controller=theme&action=edit&id=<?= $theme->id ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Supprimer</button>
</div>
