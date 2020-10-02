<?php

require '../vendor/autoload.php';

use Expreql\Expreql\Database;
use Routier\Routier\Router;

$config = parse_ini_file('config.ini');

Database::set_config($config);
$router = new Router();

$router->get('/', function () {
    
});

$router->execute();

?>


