<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../public/cors.php';
require_once __DIR__ . '/../public/env.php';

/* Importamos las clases */
use App\Core\Routes\Router;
use App\Core\Middlewares\AuthMiddleware;

/* Controladores */
use App\Controllers\UserController;

/* Instanciamos el enrutador*/
$Route = new Router;

/* Prefijos */
$Route->prefix('/Server/HDP', function($App){
    $App->get('/List', [new UserController(), 'Index']);
    //$App->get('/List/Access', [new UserController(), 'Auth'], [AuthMiddleware::class]);
    $App->get('/List/Access', [new UserController(), 'Auth']);
});

$Route->run();