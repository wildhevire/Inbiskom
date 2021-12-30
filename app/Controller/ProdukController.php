<?php

namespace app\Controller;

use app\Core\View;

class ProdukController
{
    public function index(){
        View::RenderDashboard("Produk/index", [
            'title' => 'Produk',
            'page_type' => 'produk'
        ]);
    }
}