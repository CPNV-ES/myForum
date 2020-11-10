<script src="view/opinions/opinionlist.js" defer></script>

<?php ob_start();?>
<h1 class="text-center">Opinions</h1>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>vide</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($opinions as $opinion) :
                    ?>
                    <tr>
                        <td><?= $opinion->pseudo ?></td>
                        <td><?= $opinion->description ?></td>
                        <td><?= $opinion->opinionState ?></td>
                    </tr>
                    <?php
                endforeach;
            ?>
        </tbody>
    <table>
</div>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT'] . "/view/layout.view.php";
?>