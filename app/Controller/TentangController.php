<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\View;
use app\Repository\KatalogRepository;
use app\Service\KatalogService;

class TentangController
{
  private KatalogRepository $repository;
  private KatalogService $service;

  public function __construct()
  {
      $this->repository = new KatalogRepository(Database::getConnection());
      $this->service = new KatalogService($this->repository);
  }


  public function index()
  {
      
      
      $konfigurasi = $this->service->GetKonfigurasi();
      
    //    echo '<pre>' , var_dump($tokoModel) , '</pre>';
      View::RenderKatalog("Katalog-Tentang/index", [
          'konfigurasi' => $konfigurasi,
      ]);
  }

}