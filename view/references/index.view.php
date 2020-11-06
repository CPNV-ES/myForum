<?php ob_start() ?>
<script src="view/references/references.js"></script>

<h1 class="text-center p-5">List Reference</h1>

<div class="container">
    <table class="table">
    <?php foreach ($references as $reference): ?>
        <tr>
            <td class="w-25">
                <a href="<?= $reference->url ?>" class="mr-4"><span class="fas fa-eye hidden-element"></span></a>
                <a id="<?= $reference->id ?>" href="?controller=reference&action=show&id=<?= $reference->id; ?>"><span class="fas fa-search-plus hidden-element"></span></a>
            </td>
            <td>
                <?= $reference->description ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>

<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
