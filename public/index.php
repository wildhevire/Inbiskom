<?php

require_once __DIR__ .'/../vendor/autoload.php';

use app\Core\Router;
use app\Controller\DashboardController;


function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}

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

//Produk
Router::Add('GET', '/dashboard-produk',
    \app\Controller\ProdukController::class, 'index',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('POST', '/UpdateProduk',
    \app\Controller\ProdukController::class, 'UpdateProduk',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('POST', '/DeleteProduk',
    \app\Controller\ProdukController::class, 'DeleteProduk',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('POST', '/AddProduk',
    \app\Controller\ProdukController::class, 'AddProduk',
    [\app\Middleware\MustLoginMiddleware::class]
);

//Konfig
Router::Add('POST', '/TambahKonfig',
    \app\Controller\KonfigurasiController::class, 'AddKonfigurasi',
    [\app\Middleware\MustLoginMiddleware::class]
);

//Penjual
Router::Add('POST', '/UpdatePenjual',
    \app\Controller\PenjualController::class, 'UpdatePenjual',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('POST', '/AddPenjual',
    \app\Controller\PenjualController::class, 'AddPenjual',
    [\app\Middleware\MustLoginMiddleware::class]
);
Router::Add('POST', '/DeletePenjual',
    \app\Controller\PenjualController::class, 'DeletePenjual',
    [\app\Middleware\MustLoginMiddleware::class]
);

Router::Add('POST', '/DeletePengguna',
    \app\Controller\PenggunaController::class, 'DeletePengguna',
    [\app\Middleware\MustLoginMiddleware::class]
);


//Login
Router::Add('GET', '/dashboard-login',
    \app\Controller\PenggunaController::class, 'Login',
    [\app\Middleware\MustNotLoginMiddleware::class]);

Router::Add('GET', '/auth-logout',
    \app\Controller\PenggunaController::class, 'Logout');


//Form Action Handler
Router::Add('POST', '/auth',
    \app\Controller\PenggunaController::class, 'Authenticate');
Router::Add('POST', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'AddPengguna',
    [\app\Middleware\MustLoginMiddleware::class]);
Router::Add('POST', '/AddKategori',
    \app\Controller\KategoriController::class, 'AddKategori',
    [\app\Middleware\MustLoginMiddleware::class]);
Router::Add('POST', '/UpdateKategori',
    \app\Controller\KategoriController::class, 'UpdateKategori',
    [\app\Middleware\MustLoginMiddleware::class]);
Router::Add('POST', '/DeleteKategori',
    \app\Controller\KategoriController::class, 'DeleteKategori',
    [\app\Middleware\MustLoginMiddleware::class]);

//KONFIGURASI
Router::Add('POST', '/TambahKonfig',
    \app\Controller\KonfigurasiController::class, 'AddKonfigurasi',
    [\app\Middleware\MustLoginMiddleware::class]);

//Kelompok
Router::Add('POST', '/TambahKelompok',
    \app\Controller\KelompokController::class, 'TambahKelompok',
    [\app\Middleware\MustLoginMiddleware::class]);
Router::Add('POST', '/UpdateKelompok',
    \app\Controller\KelompokController::class, 'UpdateKelompok',
    [\app\Middleware\MustLoginMiddleware::class]);
Router::Add('POST', '/DeleteKelompok',
    \app\Controller\KelompokController::class, 'DeleteKelompok',
    [\app\Middleware\MustLoginMiddleware::class]);



//KATALOG
Router::Add('GET', '/',
    \app\Controller\KatalogHomeController::class, 'index');

Router::Add('GET', '/produk',
    \app\Controller\KatalogProdukController::class, 'index');

Router::Add('GET', '/toko',
    \app\Controller\TokoController::class, 'index');

Router::Add('GET', '/search',
    \app\Controller\SearchController::class, 'index');

Router::Add('GET', '/tentang',
    \app\Controller\TentangController::class, 'index');



Router::Add('GET', '/404',
    \app\Controller\KatalogHomeController::class, 'Error');

//TODO :TEST Purpose ONLY
Router::Add('GET', '/AddPengguna',
    \app\Controller\PenggunaController::class, 'RenderAddPengguna',
    [\app\Middleware\MustNotLoginMiddleware::class]);


Router::Add('POST', '/update-pengguna',
    \app\Controller\PenggunaController::class, 'UpdatePengguna',
    [\app\Middleware\MustLoginMiddleware::class]);


Router::Run();