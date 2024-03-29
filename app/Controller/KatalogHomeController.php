<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\Repository\BannerRepository;
use app\Repository\KatalogRepository;
use app\Repository\KategoriRepository;
use app\Service\BannerService;
use app\Service\KatalogService;
use app\Service\KategoriService;

class KatalogHomeController
{
    private KatalogRepository $repository;
    private KatalogService $service;

    private KategoriRepository $kategoriRepository;
    private KategoriService $kategoriService;

    private BannerRepository $bannerRepository;
    private BannerService $bannerService;

    public function __construct()
    {
        $this->repository = new KatalogRepository(Database::getConnection());
        $this->service = new KatalogService($this->repository);

        $this->kategoriRepository = new KategoriRepository(Database::getConnection());
        $this->kategoriService = new KategoriService($this->kategoriRepository);

        $this->bannerRepository = new BannerRepository(Database::getConnection());
        $this->bannerService = new BannerService($this->bannerRepository);

    }

    public function index()
    {

            $kategori = $this->kategoriService->GetAllModel();
            $model = array();
            $konfigurasi = $this->service->GetKonfigurasi();
            foreach ($kategori as $item)
            {
                $model[$item['nama_kategori']] = $this->service->GetAllModelHome($item['nama_kategori'], 5);
                //array_push($model, $produk);
            }
            //    echo '<pre>' , var_dump($kategori) , '</pre>';
            //    echo '<pre>' , var_dump($model) , '</pre>';

            View::RenderKatalog("Katalog-Home/index", [
                'kategori' => $kategori,
                'katalog' => $model,
                'konfigurasi' => $konfigurasi,
                'carousel' => $this->bannerService->GetAllActiveModel()
            ]);



    }

    public function Error()
    {
        $kategori = $this->kategoriService->GetAllModel();
        $model = array();
        $konfigurasi = $this->service->GetKonfigurasi();
        foreach ($kategori as $item)
        {
            $model[$item['nama_kategori']] = $this->service->GetAllModelHome($item['nama_kategori'], 5);
            //array_push($model, $produk);
        }
        View::RenderKatalog("404", [
            'kategori' => $kategori,
            'katalog' => $model,
            'konfigurasi' => $konfigurasi,
        ]);
    }



}