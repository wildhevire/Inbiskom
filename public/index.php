<?php
use app\core\Application;
use app\controllers;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [controllers\HomeController::class, 'index']);
$app->router->get('/katalog', [controllers\KatalogController::class, 'index']);

$app->run();
