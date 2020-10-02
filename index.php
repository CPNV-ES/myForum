<?php

require 'vendor/autoload.php';

require 'core/Renderer.php';

use Expreql\Expreql\Database;
use Routier\Routier\Router;

$config = parse_ini_file('config.ini');

Database::set_config($config);
$router = new Router();
$renderer = Renderer::get_instance();

$router->get('/', function () {
    
});

$router->execute();

?>


