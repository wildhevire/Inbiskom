<?php

require_once __DIR__ .'/../vendor/autoload.php';

use app\Core\Router;
use app\Controller\HomeController;

Router::Add('GET', '/', HomeController::class, 'index');
Router::Add('GET', '/config', \app\Controller\KonfigurasiController::class, 'index');

Router::Run();