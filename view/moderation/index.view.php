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
            <th class="description-title-cyan white-text">Auteur</th>
            <th class="blue-gradient-rgba white-text">Opinion</th>
            <th class="description-title white-text">Etat</th>
            <th>
                <select name="states" id="states" class="description-title white-text">
                    <option value="all">--- Tous ---</option>
                    <?php
                        foreach($states as $state) 
                        {
                            echo <<<EOD
                                <option value="$state->name">$state->name</option>
                            EOD;
                        }
                    ?>
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
</div>