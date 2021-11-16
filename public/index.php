<?php
use app\core\Application;
use app\controllers\HomeController;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/home', [HomeController::class, 'home']);

$app->run();
