<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\View;
// use app\Repository\FotoRepository;
use app\Repository\KatalogRepository;
// use app\Repository\ProdukRepository;
// use app\Service\FotoService;
use app\Service\KatalogService;
// use app\Service\ProdukService;
use app\Repository\KategoriRepository;
use app\Service\KategoriService;

use function PHPUnit\Framework\isEmpty;

class SearchController
{
  private KatalogRepository $repository;
  private KategoriRepository $kategoriRepository;
  private KategoriService $kategoriService;
  //   private KatalogService $service;

  //   private FotoRepository $fotoRepository;
  //   private ProdukRepository $produkRepository;

  public function __construct()
  {
    $this->repository = new KatalogRepository(Database::getConnection());
    $this->service = new KatalogService($this->repository);
    $this->kategoriRepository = new KategoriRepository(Database::getConnection());
    $this->kategoriService = new KategoriService($this->kategoriRepository);
    // $this->fotoRepository = new FotoRepository(Database::getConnection());
    // $this->fotoService = new FotoService($this->fotoRepository);
    // $this->produkRepository = new ProdukRepository(Database::getConnection());
    // $this->produkService = new ProdukService($this->produkRepository);
  }


  public function index()
  {
    $request = isset($_GET['q']) ?  $_GET['q'] : '';

    $reqKategori = isset($_GET['kategori']) ?  $_GET['kategori'] : '';
    $reqAngkatan = isset($_GET['angkatan']) ?  $_GET['angkatan'] : '';
    $hargaMin = isset($_GET['min']) ?  $_GET['min'] : '';
    $hargaMax = isset($_GET['max']) ?  $_GET['max'] : '';
    $searchProduct = $this->service->GetSearchResultProduct($request, $reqKategori, $reqAngkatan, $hargaMin, $hargaMax);
    $searchToko = $this->service->GetSearchResultToko($request, $reqKategori, $reqAngkatan);
    $kategori = $this->kategoriService->GetAllModel();
    $konfigurasi = $this->service->GetKonfigurasi();
    
    //   $tokoModel = $this->service->GetTokoDescription($request);
    //   $memberModel = $this->service->GetTokoDescriptionMember($request);
    //   $productsModel = $this->service->GetTokoDescriptionProducts($request);

    //  echo '<pre>' , var_dump($searchToko) , '</pre>';
    View::RenderKatalog("Katalog-Search/index", [
      'searchProduct' => $searchProduct,
      'searchToko' => $searchToko,
      'kategori' => $kategori,
      'konfigurasi' => $konfigurasi,
    ]);
  }
}
