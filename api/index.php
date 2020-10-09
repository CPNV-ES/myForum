<?php

require '../vendor/autoload.php';

use Expreql\Expreql\Database;
use Routier\Routier\Router;

$config = parse_ini_file('../config.ini');

Database::set_config($config);
$router = new Router();

$router->get('/api/roles', function () {
    require_once '../models/Role.php';

    $roles = Role::select()->execute();

    Router::json($roles->getArrayCopy());
});

$router->get('/api/themes', function() {
    require_once '../models/Theme.php';

    $themes = Theme::select()->execute();

    Router::json($themes->getArrayCopy());
});

$router->get('/api/references', function() {
    require_once '../models/Reference.php';

    $references = Reference::select()->execute();

    Router::json($references->getArrayCopy());
});

$router->get('/api/states', function() {
    require_once '../models/State.php';

    $states = State::select()->execute();

    Router::json($states->getArrayCopy());
});

$router->execute();

?>


