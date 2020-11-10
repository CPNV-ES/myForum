<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyForum - MBU</title>
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
    <link rel="stylesheet" href="view/styles.css">
    <script src="node_modules/mdbootstrap/js/jquery.js"></script>
    <script src="node_modules/mdbootstrap/js/bootstrap.js"></script>
    <script src="node_modules/mdbootstrap/js/popper.js"></script>
    <script src="view/common.js"></script>
</head>
<body>

<div id="flash-message-container">
    <?php
        while($message = ViewHelpers::shiftFlashMessage()) {
            $toast_class = "";
            $icon_class = "";
            $title = "";
            switch($message["type"]) {
                case "warning":
                    $toast_class = "flash-message-warning";
                    $icon_class = "fas fa-exclamation-circle yellow-text mr-2";
                    $title = "Avertissement";
                    break;
                case "error":
                    $toast_class = "flash-message-warning";
                    $icon_class = "fas fa-exclamation-triangle red-text mr-2";
                    $title = "Erreur";
                    break;
                default:
                    $toast_class = "flash-message-info";
                    $icon_class = "fas fa-info-circle blue-text mr-2";
                    $title = "Info";
            }

            echo <<<EOF
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast $toast_class" data-autohide="true" data-delay="10000">
                <div class="toast-header">
                    <i class="{$icon_class}"></i>
                    <strong class="mr-auto">$title</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {$message['text']}
                </div>
            </div>
EOF;
        }

    $_SESSION["flash_messages"] = [];

    ?>

</div>

<div class="w-100 bg-primary font-weight-bolder p-5 navbar"><a class="text-reset" href="/"><h1>My Forum - Beta 1.0</h1></a></div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utilisateur
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Alexandre</a>
                <a class="dropdown-item" href="#">Andi</a>
                <a class="dropdown-item" href="#">Cyril</a>
                <a class="dropdown-item" href="#">Dimitri</a>
                <a class="dropdown-item" href="#">Dylan</a>
                <a class="dropdown-item" href="#">Gabriel</a>
                <a class="dropdown-item" href="#">Mathieu</a>
                <a class="dropdown-item" href="#">Quentin</a>
                <a class="dropdown-item" href="#">Sou</a>
                <a class="dropdown-item" href="#">William</a>
                <a class="dropdown-item" href="#">Xavier</a>
            </div>
        </li>
        <li class="nav-item"><a href="?controller=theme&action=index" class="btn">Gestion des thèmes</a></li>
        <li class="nav-item"><a href="?controller=reference&action=index" class="btn">Gestion des références</a></li>
        <li class="nav-item"><a href="?controller=role&action=index" class="btn">Gestion des rôles</a></li>
        <li class="nav-item"><a href="?controller=state&action=index" class="btn">Gestion des états</a></li>
        <li class="nav-item"><a href="?controller=moderation&action=index" class="btn">Modération</a></li>
    </ul>
</nav>
<div class="container-fluid">
    <?= $content ?>
</div>
</body>
</html>
