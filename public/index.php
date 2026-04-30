<?php

use app\Core\Router;


$pdo = require __DIR__ . '/../database/init_db.php';

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Core/Router.php';

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($pdo);

$router->load($routes);

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);