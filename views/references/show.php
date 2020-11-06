<h1 class="text-center"><?= $reference->description ?></h1>
<table class="table">
    <thead>
        <tr>
            <th>Description</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $reference->description ?></td>
            <td><?= $reference->url ?></td>
            <td>
                <a class="btn btn-secondary" href="/references/<?= $reference->id ?>/edit">Edit</a>
                <a class="btn btn-danger" href="/references/<?= $reference->id ?>/delete">Delete</a>
            </td>
        </tr>
    </tbody>
</table>