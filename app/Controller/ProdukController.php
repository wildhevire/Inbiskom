<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\Session;
use app\Core\View;
use app\DTO\Produk\ProdukRequest;
use app\Repository\FotoRepository;
use app\Repository\KelompokRepository;
use app\Repository\ProdukRepository;
use app\Service\FotoService;
use app\Service\KelompokService;
use app\Service\ProdukService;

class ProdukController
{
    private ProdukRepository $produkRepository;
    private ProdukService $produkService;
    private Session $session;

    private KelompokRepository $kelompokRepository;
    private KelompokService $kelompokService;

    private FotoRepository $fotoRepository;
    private FotoService $fotoService;
    public function __construct()
    {
        $this->produkRepository = new ProdukRepository(Database::getConnection());
        $this->produkService = new ProdukService($this->produkRepository);
        $this->kelompokRepository = new KelompokRepository(Database::getConnection());
        $this->fotoRepository = new FotoRepository(Database::getConnection());
        $this->fotoService = new FotoService($this->fotoRepository);
        $this->kelompokService = new KelompokService($this->kelompokRepository);

    }
    public function index(){
        View::RenderDashboard("Produk/index", [
            'title' => 'Produk',
            'page_type' => 'produk',
            'produk' => $this->produkService->GetAllModel(),
            'kelompok' => $this->kelompokService->GetAllModel()
        ]);

//        echo '<pre>' , var_dump($this->produkService->GetAllModel()) , '</pre>';
    }

    public function AddProduk()
    {

        echo '<pre>' , var_dump($_POST) , '</pre>';

    }
    public function UpdateProduk()
    {

        echo '<pre>' , var_dump($_POST) , '</pre>';
    }

    public function DeleteProduk()
    {

        echo '<pre>' , var_dump($_POST) , '</pre>';
    }

    private function InsertSingleProduk(string $onPostId,string $kelompokID)
    {

    }
}