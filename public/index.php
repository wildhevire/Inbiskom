<?php

require_once __DIR__ .'/../vendor/autoload.php';

use app\Core\Router;
use app\Controller\DashboardController;

//Login
Router::Add('GET', '/dashboard-login',
    \app\Controller\PenggunaController::class, 'index');
Router::Add('POST', '/auth',
    \app\Controller\PenggunaController::class, 'Authenticate');
Router::Add('GET', '/auth-logout',
    \app\Controller\PenggunaController::class, 'Logout');
//Dashboard
Router::Add('GET', '/dashboard-home',
    DashboardController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-konfigurasi',
    \app\Controller\KonfigurasiController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-kategori',
    \app\Controller\KategoriController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);


//TEST Purpose ONLY
Router::Add('GET', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'RenderAddPengguna');
Router::Add('POST', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'AddPengguna');

Router::Run();