<?php

namespace app\Controller;

use app\Core\View;

class KategoriController
{
    public function index() : void{
        View::RenderDashboard("Kategori/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}