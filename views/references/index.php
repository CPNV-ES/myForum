<a class="btn btn-primary" href="">Create</a>
<table class="table">
    <thead>
        <tr>
            <th>Description</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($references as $ref) : ?>
            <tr>
                <td><?= $ref->description ?></td>
                <td><?= $ref->url ?></td>
                <td><a class="btn btn-secondary" href="/references/<?= $ref->id ?>/show">Details</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>