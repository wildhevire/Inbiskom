<?php

namespace app\Controller;

use app\Core\View;

class KategoriController
{
    public function index() : void{
        View::renderDashboard("Kategori/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}