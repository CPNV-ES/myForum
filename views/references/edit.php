<h1 class="text-center"><?= $reference->description ?></h1>

<form class="form" action="/references/<?= $reference->id ?>/edit" method="POST">
    <div class="my-4">
        <input class="form-control" type="text" name="description" value="<?= $reference->description ?>">
    </div>
    <div class="mb-4">
        <input class="form-control" type="text" name="url" value="<?= $reference->url ?>">
    </div>
    <input class="btn btn-success" type="submit" value="Modifier">
</form>