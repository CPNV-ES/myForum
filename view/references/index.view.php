<?php ob_start(); ?>
<script src="view/references.js"></script>

<h1 class="text-center p-5">List Reference</h1>

<div class="container">
    <table class="table">
    <?php foreach ($references as $reference): ?>
        <tr>
            <td>
                <i class="fas fa-eye mr-4"></i>
                <i class="fas fa-search-plus"></i>
            </td>
            <td>
                <a id="<?= $reference->id ?>" href="?controller=reference&action=show&id=<?= $reference->id; ?>"><?= $reference->description ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
