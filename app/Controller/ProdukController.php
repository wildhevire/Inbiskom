<?php

namespace app\Controller;

use app\Config\Database;
use app\Core\View;
use app\Repository\ProdukRepository;
use app\Service\ProdukService;

class ProdukController
{
    private ProdukRepository $produkRepository;
    private ProdukService $produkService;
    public function __construct()
    {
        $this->produkRepository = new ProdukRepository(Database::getConnection());
        $this->produkService = new ProdukService($this->produkRepository);
    }
    public function index(){
        View::RenderDashboard("Produk/index", [
            'title' => 'Produk',
            'page_type' => 'produk',
            'produk' => $this->produkService->GetAllModel()
        ]);

//        echo '<pre>' , var_dump($this->produkService->GetAllModel()) , '</pre>';
    }
}