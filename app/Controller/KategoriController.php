<?php

namespace app\Controller;

use app\Core\View;

class KategoriController
{
    public function index() : void{
        View::render("Konfigurasi/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}