<script type="module">

import "./scripts/display.js";

</script>
<?php ob_start(); ?>
<h1 class="text-center p-5">Show : <?= $reference->description ?></h1>



<table class="table">
    <thead>
        <tr>
            <th>Description</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>

    </thead>
    <tbody>
        <tr>
            <td>
                <?= $reference->description ?>
            </td>
            <td>
                <?= $reference->url ?>
            </td>
            <td>
                <a class="btn btn-primary" href="?controller=Reference&action=edit&id=<?= $reference->id ?>">Edit</a>
                <a id="delete" class="btn btn-danger"  href="?controller=Reference&action=destroy&id=<?= $reference->id ?>">Delete</a></td>
            </td>
        </tr>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>