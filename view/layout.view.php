<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>myForum</title>
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <script src="node_modules/mdbootstrap/js/jquery.js"></script>
    <script src="node_modules/mdbootstrap/js/bootstrap.js"></script>
    <script src="node_modules/mdbootstrap/js/popper.js"></script>
</head>
<body>
<div class="w-100 bg-primary font-weight-bolder p-5 navbar"><a class="text-reset" href="/"><h1>My Forum</h1></a></div>
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
    </ul>
</nav>
<div class="container-fluid">
    <?= $content ?>
</div>
<footer class="page-footer font-small elegant-color mt-5">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#">Andi</a>
  </div>
  <!-- Copyright -->

</footer>
</body>
</html>
