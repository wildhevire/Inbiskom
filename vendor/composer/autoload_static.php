<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbfad96638d668b20980ec57ab95a7998
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'app\\Config\\Database' => __DIR__ . '/../..' . '/app/Config/Database.php',
        'app\\Controller\\BannerController' => __DIR__ . '/../..' . '/app/Controller/BannerController.php',
        'app\\Controller\\DashboardController' => __DIR__ . '/../..' . '/app/Controller/DashboardController.php',
        'app\\Controller\\KatalogHomeController' => __DIR__ . '/../..' . '/app/Controller/KatalogHomeController.php',
        'app\\Controller\\KatalogProdukController' => __DIR__ . '/../..' . '/app/Controller/KatalogProdukController.php',
        'app\\Controller\\KategoriController' => __DIR__ . '/../..' . '/app/Controller/KategoriController.php',
        'app\\Controller\\KelompokController' => __DIR__ . '/../..' . '/app/Controller/KelompokController.php',
        'app\\Controller\\KonfigurasiController' => __DIR__ . '/../..' . '/app/Controller/KonfigurasiController.php',
        'app\\Controller\\PenggunaController' => __DIR__ . '/../..' . '/app/Controller/PenggunaController.php',
        'app\\Controller\\PenjualController' => __DIR__ . '/../..' . '/app/Controller/PenjualController.php',
        'app\\Controller\\ProdukController' => __DIR__ . '/../..' . '/app/Controller/ProdukController.php',
        'app\\Controller\\SearchController' => __DIR__ . '/../..' . '/app/Controller/SearchController.php',
        'app\\Controller\\TentangController' => __DIR__ . '/../..' . '/app/Controller/TentangController.php',
        'app\\Controller\\TokoController' => __DIR__ . '/../..' . '/app/Controller/TokoController.php',
        'app\\Core\\FileUploadInfo' => __DIR__ . '/../..' . '/app/Core/FileUploadInfo.php',
        'app\\Core\\FileUploader' => __DIR__ . '/../..' . '/app/Core/FileUploader.php',
        'app\\Core\\Middleware' => __DIR__ . '/../..' . '/app/Core/Middleware.php',
        'app\\Core\\Router' => __DIR__ . '/../..' . '/app/Core/Router.php',
        'app\\Core\\Session' => __DIR__ . '/../..' . '/app/Core/Session.php',
        'app\\Core\\View' => __DIR__ . '/../..' . '/app/Core/View.php',
        'app\\DBModel\\Banner' => __DIR__ . '/../..' . '/app/DBModel/Banner.php',
        'app\\DBModel\\DetailKelompok' => __DIR__ . '/../..' . '/app/DBModel/DetailKelompok.php',
        'app\\DBModel\\Foto' => __DIR__ . '/../..' . '/app/DBModel/Foto.php',
        'app\\DBModel\\Kategori' => __DIR__ . '/../..' . '/app/DBModel/Kategori.php',
        'app\\DBModel\\Kelompok' => __DIR__ . '/../..' . '/app/DBModel/Kelompok.php',
        'app\\DBModel\\Konfigurasi' => __DIR__ . '/../..' . '/app/DBModel/Konfigurasi.php',
        'app\\DBModel\\Pengguna' => __DIR__ . '/../..' . '/app/DBModel/Pengguna.php',
        'app\\DBModel\\Produk' => __DIR__ . '/../..' . '/app/DBModel/Produk.php',
        'app\\DTO\\Banner\\BannerRequest' => __DIR__ . '/../..' . '/app/DTO/Banner/BannerRequest.php',
        'app\\DTO\\Banner\\BannerResponse' => __DIR__ . '/../..' . '/app/DTO/Banner/BannerResponse.php',
        'app\\DTO\\DetailKelompok\\DetailKelompokRequest' => __DIR__ . '/../..' . '/app/DTO/DetailKelompok/DetailKelompokRequest.php',
        'app\\DTO\\DetailKelompok\\DetailKelompokResponse' => __DIR__ . '/../..' . '/app/DTO/DetailKelompok/DetailKelompokResponse.php',
        'app\\DTO\\Foto\\FotoRequest' => __DIR__ . '/../..' . '/app/DTO/Foto/FotoRequest.php',
        'app\\DTO\\Foto\\FotoResponse' => __DIR__ . '/../..' . '/app/DTO/Foto/FotoResponse.php',
        'app\\DTO\\Katalog\\KatalogHome' => __DIR__ . '/../..' . '/app/DTO/Katalog/KatalogHome.php',
        'app\\DTO\\Kategori\\KategoriRequest' => __DIR__ . '/../..' . '/app/DTO/Kategori/KategoriRequest.php',
        'app\\DTO\\Kategori\\KategoriResponse' => __DIR__ . '/../..' . '/app/DTO/Kategori/KategoriResponse.php',
        'app\\DTO\\Kelompok\\KelompokRequest' => __DIR__ . '/../..' . '/app/DTO/Kelompok/KelompokRequest.php',
        'app\\DTO\\Kelompok\\KelompokResponse' => __DIR__ . '/../..' . '/app/DTO/Kelompok/KelompokResponse.php',
        'app\\DTO\\Konfigurasi\\KonfigurasiRequest' => __DIR__ . '/../..' . '/app/DTO/Konfigurasi/KonfigurasiRequest.php',
        'app\\DTO\\Konfigurasi\\KonfigurasiResponse' => __DIR__ . '/../..' . '/app/DTO/Konfigurasi/KonfigurasiResponse.php',
        'app\\DTO\\Pengguna\\AddPenggunaRequest' => __DIR__ . '/../..' . '/app/DTO/Pengguna/AddPenggunaRequest.php',
        'app\\DTO\\Pengguna\\AddPenggunaResponse' => __DIR__ . '/../..' . '/app/DTO/Pengguna/AddPenggunaResponse.php',
        'app\\DTO\\Pengguna\\LoginPenggunaRequest' => __DIR__ . '/../..' . '/app/DTO/Pengguna/LoginPenggunaRequest.php',
        'app\\DTO\\Pengguna\\LoginPenggunaResponse' => __DIR__ . '/../..' . '/app/DTO/Pengguna/LoginPenggunaResponse.php',
        'app\\DTO\\Pengguna\\PenggunaRequest' => __DIR__ . '/../..' . '/app/DTO/Pengguna/PenggunaRequest.php',
        'app\\DTO\\Pengguna\\PenggunaResponse' => __DIR__ . '/../..' . '/app/DTO/Pengguna/PenggunaResponse.php',
        'app\\DTO\\Produk\\ProdukRequest' => __DIR__ . '/../..' . '/app/DTO/Produk/ProdukRequest.php',
        'app\\DTO\\Produk\\ProdukResponse' => __DIR__ . '/../..' . '/app/DTO/Produk/ProdukResponse.php',
        'app\\Exception\\DataAlreadyExistException' => __DIR__ . '/../..' . '/app/Exception/DataAlreadyExistException.php',
        'app\\Exception\\DatabaseQueryException' => __DIR__ . '/../..' . '/app/Exception/DatabaseQueryException.php',
        'app\\Exception\\UploadFailedException' => __DIR__ . '/../..' . '/app/Exception/UploadFailedException.php',
        'app\\Exception\\ValidationException' => __DIR__ . '/../..' . '/app/Exception/ValidationException.php',
        'app\\Middleware\\MustLoginMiddleware' => __DIR__ . '/../..' . '/app/Middleware/MustLoginMiddleware.php',
        'app\\Middleware\\MustNotLoginMiddleware' => __DIR__ . '/../..' . '/app/Middleware/MustNotLoginMiddleware.php',
        'app\\Repository\\BannerRepository' => __DIR__ . '/../..' . '/app/Repository/BannerRepository.php',
        'app\\Repository\\DetailKelompokRepository' => __DIR__ . '/../..' . '/app/Repository/DetailKelompokRepository.php',
        'app\\Repository\\FotoRepository' => __DIR__ . '/../..' . '/app/Repository/FotoRepository.php',
        'app\\Repository\\KatalogRepository' => __DIR__ . '/../..' . '/app/Repository/KatalogRepository.php',
        'app\\Repository\\KategoriRepository' => __DIR__ . '/../..' . '/app/Repository/KategoriRepository.php',
        'app\\Repository\\KelompokRepository' => __DIR__ . '/../..' . '/app/Repository/KelompokRepository.php',
        'app\\Repository\\KonfigurasiRepository' => __DIR__ . '/../..' . '/app/Repository/KonfigurasiRepository.php',
        'app\\Repository\\OverviewRepository' => __DIR__ . '/../..' . '/app/Repository/OverviewRepository.php',
        'app\\Repository\\PenggunaRepository' => __DIR__ . '/../..' . '/app/Repository/PenggunaRepository.php',
        'app\\Repository\\ProdukRepository' => __DIR__ . '/../..' . '/app/Repository/ProdukRepository.php',
        'app\\Service\\BannerService' => __DIR__ . '/../..' . '/app/Service/BannerService.php',
        'app\\Service\\DetailKelompokService' => __DIR__ . '/../..' . '/app/Service/DetailKelompokService.php',
        'app\\Service\\FotoService' => __DIR__ . '/../..' . '/app/Service/FotoService.php',
        'app\\Service\\KatalogService' => __DIR__ . '/../..' . '/app/Service/KatalogService.php',
        'app\\Service\\KategoriService' => __DIR__ . '/../..' . '/app/Service/KategoriService.php',
        'app\\Service\\KelompokService' => __DIR__ . '/../..' . '/app/Service/KelompokService.php',
        'app\\Service\\KonfigurasiService' => __DIR__ . '/../..' . '/app/Service/KonfigurasiService.php',
        'app\\Service\\OverviewService' => __DIR__ . '/../..' . '/app/Service/OverviewService.php',
        'app\\Service\\PenggunaService' => __DIR__ . '/../..' . '/app/Service/PenggunaService.php',
        'app\\Service\\ProdukService' => __DIR__ . '/../..' . '/app/Service/ProdukService.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbfad96638d668b20980ec57ab95a7998::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbfad96638d668b20980ec57ab95a7998::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbfad96638d668b20980ec57ab95a7998::$classMap;

        }, null, ClassLoader::class);
    }
}