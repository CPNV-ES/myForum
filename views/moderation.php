<h1>Opinions</h1>

<div class="row justify-content-end">
    <div class="col col-2">
        <div>Filtre: </div>
        <select class="form-control " name="filter" id="filter">
            <option value="all">--- Tous ---</option>
            <?php foreach ($opinion_states as $state) : ?>
                <option value="<?= $state->id?>"><?= $state->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<table class="table">
    <tbody>
        <?php foreach ($opinions as $opinion) : ?>
            <tr>
                <td><?= $opinion->users[0]->pseudo ?></td>
                <td><?= $opinion->description ?></td>
                <td><?= $opinion->opinionstates[0]->name ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>