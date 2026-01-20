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

/* Prefijos URL */
$Route->prefix('/Users/Action', function ($App) {
    $App->post('/Show', [new UserController(), 'Show']);
    $App->post('/Insert', [new UserController(), 'Insert']);
    $App->put('/Update', [new UserController(), 'Update']);
    $App->delete('/Delete', [new UserController(), 'Delete']);
});

$Route->run();
