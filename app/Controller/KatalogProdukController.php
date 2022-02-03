<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\View;
use app\Repository\FotoRepository;
use app\Repository\KatalogRepository;
use app\Repository\ProdukRepository;
use app\Service\FotoService;
use app\Service\KatalogService;
use app\Service\ProdukService;

class KatalogProdukController
{
    private KatalogRepository $repository;
    private KatalogService $service;

    private FotoRepository $fotoRepository;
    private FotoService $fotoService;

    private ProdukRepository $produkRepository;
    private ProdukService $produkService;

    public function __construct()
    {
        $this->repository = new KatalogRepository(Database::getConnection());
        $this->service = new KatalogService($this->repository);
        $this->fotoRepository = new FotoRepository(Database::getConnection());
        $this->fotoService = new FotoService($this->fotoRepository);
        $this->produkRepository = new ProdukRepository(Database::getConnection());
        $this->produkService = new ProdukService($this->produkRepository);
    }


    public function index()
    {
        $request = $_GET['q'];
        $model = $this->service->GetProduk($request);
        $foto = $this->fotoService->GetFotoForProduk($request);
        $noWa = $this->service->GetNoWa();
        $this->produkRepository->UpdateViewsCount($request);
        $konfigurasi = $this->service->GetKonfigurasi();
        $primaryFoto = '';
        $fotoPelengkap = [];
        foreach ($foto as $item)
        {
            if($item['is_primary'] == 1){
                $primaryFoto = $item;
            }
            else{
                array_push($fotoPelengkap, $item);
            }
        }
    //    echo '<pre>' , var_dump($noWa) , '</pre>';
        View::RenderKatalog("Katalog-Produk/index", [
            'produk' => $model,
            'fotoPrimary' => $primaryFoto,
            'fotoPelengkap' => $fotoPelengkap,
            'noWa' => $noWa,
            'konfigurasi' => $konfigurasi,
        ]);
    }

}