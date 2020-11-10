<script src="view/opinions/opinionlist.js" defer></script>

<?php ob_start();?>
<h1 class="text-center">Opinions</h1>

<div class="row">
    <table id="opinionTable" class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>
                    <select id="statusFilter" name="status">
                        <option value="all">--- Tous ---</option>
                        <?php foreach($states as $state) :
                            ?>
                                <option value="<?= $state ?>"><?= ucfirst($state) ?></option>
                            <?
                            endforeach;
                        ?>
                    </select>
                </th>
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