<?php

require './vendor/autoload.php';

require 'core/Renderer.php';

use Expreql\Expreql\Database;
use Routier\Routier\Router;

$config = parse_ini_file('config.ini');

Database::set_config($config);
$router = new Router();
$renderer = Renderer::get_instance();

// Set the layout used on every page
$renderer->layout('layout.php');

// Home page
$router->get('/', function () use ($renderer) {
    $renderer->view('views/index.php')->render();
});

$router->get('/references', function () use ($renderer) {
    require './models/Reference.php';
    
    $references = Reference::select()->execute(); 

    $renderer->view('views/references/index.php')->values([
        'references' => $references,
    ])->render();
});

$router->execute();
