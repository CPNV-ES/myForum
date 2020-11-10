<?php ob_start(); ?>
<h1 class="text-center p-5">Modération</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr>
            <th class="description-title-cyan white-text">Pseudo</th>
            <th class="blue-gradient-rgba white-text">Opinion</th>
            <th class="description-title white-text">State</th>
            <th>
                <select name="states" id="states" class="description-title white-text">
                    <option value="all">--- Tous ---</option>
                    <option value="saab">Censuré</option>
                    <option value="opel">Clos</option>
                    <option value="audi">En discussion</option>
                    <option value="audi">Proposé</option>
                    <option value="audi">Publié</option>
                </select>
            </th>
        </tr>
    </thead>
    <tbody>

<?php
foreach($opinions as $opinion) {
    echo <<<EOD
    <tr>
        <th>
            $opinion->pseudo
        </th>
        <th>
            $opinion->description

        </th>
        <th>
            $opinion->name
        </th>
    </tr>
EOD;
}
?>

    </tbody>
</table>
<a href="/?controller=opinion&action=create"><button type="button" class="btn btn-primary">Nouveau</button></a>
</div>