<?php

require_once __DIR__ .'/../vendor/autoload.php';

use app\Core\Router;
use app\Controller\DashboardController;

Router::Add('GET', '/dashboard-home', DashboardController::class, 'index');
Router::Add('GET', '/dashboard-konfigurasi', \app\Controller\KonfigurasiController::class, 'index');
Router::Add('GET', '/dashboard-kategori', \app\Controller\KategoriController::class, 'index');

Router::Run();