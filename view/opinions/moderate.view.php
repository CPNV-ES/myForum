<?php ob_start(); ?>
<h1 class="text-center p-5">Moderate Opinions</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">
<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr class="blue-gradient-rgba white-text">
            <th>Author</th>
            <th>Opinion</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach($opinions as $opinion) {
        echo "<tr>";
        echo "<td>{$opinion->user_pseudo}</td>";
        echo "<td>{$opinion->description}</td>";
        echo "<td>{$opinion->state}</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>
</div>