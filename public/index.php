<?php

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = require __DIR__ . '/../database/init_db.php';

use App\Controllers\ServiceController;

$controller = new ServiceController($pdo);
$controller->index();