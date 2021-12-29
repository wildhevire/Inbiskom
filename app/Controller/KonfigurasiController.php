<?php

namespace app\Controller;

use app\Core\View;

class KonfigurasiController
{
    public function index(){
        View::render("Konfigurasi/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}