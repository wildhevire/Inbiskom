<?php

namespace app\Controller;

use app\Core\View;

class KonfigurasiController
{
    public function index(){
        View::renderDashboard("Konfigurasi/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}