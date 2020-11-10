<?php ob_start(); ?>
<h1 class="text-center p-5">Opinions</h1>
<?php
$content = ob_get_clean();
require_once $_SERVER['DOCUMENT_ROOT']."/view/layout.view.php";
?>
<div class="container">

<label for="filter">Filtre</label>
<select id="filter">
    <option value="-1">--- Tous ---</option>
    <?php

    foreach($opinionStates as $opinionState) {
        echo "<option value='{$opinionState->id}'>{$opinionState->name}</option>";
    }

    ?>
</select>

<table class='table table-borderless table-sm col col-12'>
    <thead>
        <tr class="blue-gradient-rgba white-text">
            <th>Autheur</th>
            <th>Opinion</th>
            <th>Etat</th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach($opinions as $opinion) {
        echo "<tr class='opinion-row' data-state='{$opinion->state->id}'>";
        echo "<td>{$opinion->user_pseudo}</td>";
        echo "<td>{$opinion->description}</td>";
        echo "<td>{$opinion->state->name}</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>
</div>