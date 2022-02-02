<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\View;
// use app\Repository\FotoRepository;
// use app\Repository\KatalogRepository;
// use app\Repository\ProdukRepository;
// use app\Service\FotoService;
// use app\Service\KatalogService;
// use app\Service\ProdukService;

class SearchController
{
//   private KatalogRepository $repository;
//   private KatalogService $service;

//   private FotoRepository $fotoRepository;
//   private ProdukRepository $produkRepository;

//   public function __construct()
//   {
//       $this->repository = new KatalogRepository(Database::getConnection());
//       $this->service = new KatalogService($this->repository);
//       $this->fotoRepository = new FotoRepository(Database::getConnection());
//       $this->fotoService = new FotoService($this->fotoRepository);
//       $this->produkRepository = new ProdukRepository(Database::getConnection());
//       $this->produkService = new ProdukService($this->produkRepository);
//   }


  public function index()
  {
    //   $request = $_GET['q'];
    //   $tokoModel = $this->service->GetTokoDescription($request);
    //   $memberModel = $this->service->GetTokoDescriptionMember($request);
    //   $productsModel = $this->service->GetTokoDescriptionProducts($request);
      
      //  echo '<pre>' , var_dump($productsModel) , '</pre>';
      View::RenderKatalog("Katalog-Search/index", [
        //   'tokoDescription' => $tokoModel,
        //   'tokoMember' => $memberModel,
        //   'tokoProducts' => $productsModel,
      ]);
  }

}