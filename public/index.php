<?php

require_once __DIR__ .'/../vendor/autoload.php';

use app\Core\Router;
use app\Controller\DashboardController;


//Render Dashboard
Router::Add('GET', '/dashboard-home',
    DashboardController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-kategori',
    \app\Controller\KategoriController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-konfigurasi',
    \app\Controller\KonfigurasiController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-kelompok',
    \app\Controller\KelompokController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-penjual',
    \app\Controller\PenjualController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-pengguna',
    \app\Controller\PenggunaController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('GET', '/dashboard-produk',
    \app\Controller\ProdukController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);


//Login
Router::Add('GET', '/dashboard-login',
    \app\Controller\PenggunaController::class, 'Login',
    [\app\Middleware\MustNotLoginMiddleware::class]);
Router::Add('POST', '/auth',
    \app\Controller\PenggunaController::class, 'Authenticate');
Router::Add('GET', '/auth-logout',
    \app\Controller\PenggunaController::class, 'Logout');


//TODO :TEST Purpose ONLY
Router::Add('GET', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'RenderAddPengguna');
Router::Add('POST', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'AddPengguna');

Router::Run();