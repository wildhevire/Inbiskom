<?php

namespace app\Controller;

use app\Core\View;

class KonfigurasiController
{
    public function index(){
        View::RenderDashboard("Konfigurasi/index", [
            'title' => 'Konfigurasi'
        ]);
    }
}