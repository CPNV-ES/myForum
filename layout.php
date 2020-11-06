<?php
$renderer = Renderer::get_instance();
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myForum</title>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light px-3 border-top border-red border-4">
        <div class="row">
            <div class="col">
                <a class="navbar-brand" href="/">MyForum</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/themes">Gestion des thèmes</a>
                <a class="btn btn-primary" href="/references">Gestion des références</a>
                <a class="btn btn-primary" href="/roles">Gestion des rôles</a>
                <a class="btn btn-primary" href="/states">Gestion des états</a>
            </div>
        </div>
    </nav>
    <div id="content">
        <?php include($renderer->view_path); ?>
    </div>
</body>

</html>