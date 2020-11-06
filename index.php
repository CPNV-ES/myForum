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

$router->get('/references/:id/show', function ($params) use ($renderer) {
    require './models/Reference.php';

    if (!is_int($params['id'])) {
        Router::redirect('/');
    }

    $reference = Reference::find_by_pk($params['id']);

    $renderer->view('views/references/show.php')->values([
        'reference' => $reference,
    ])->render();
});

$router->get('/references/new', function () use ($renderer) {
    $renderer->view('views/references/new.php')->render();
});

$router->get('/references/:id/edit', function ($params) use ($renderer) {
    require './models/Reference.php';

    if (!is_int($params['id'])) {
        Router::redirect('/');
    }

    $reference = Reference::find_by_pk($params['id']);

    $renderer->view('views/references/edit.php')->values([
        'reference' => $reference,
    ])->render();
});

$router->post('/references/:id/edit', function ($params) {
    require './models/Reference.php';

    if (!is_int($params['id'])) {
        Router::redirect('/');
    }

    Reference::update([
        'description' => $_POST['description'],
        'url' => $_POST['url'],
    ])->where('id', $params['id'])->execute();

    Router::redirect('/references');
});

$router->post('/references/new', function () {
    require './models/Reference.php';

    Reference::insert([
        'description' => $_POST['description'],
        'url' => $_POST['url'],
    ]);

    Router::redirect('/references');
});

$router->execute();
