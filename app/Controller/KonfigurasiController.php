<?php

namespace app\Controller;

use app\Core\View;

class KonfigurasiController
{

    public function index(){
        View::RenderDashboard("Konfigurasi/index", [
            'title' => 'Konfigurasi',
            'page_type' => 'konfigurasi'
        ]);
    }

    public function AddKonfigurasi()
    {
//        echo '<pre>' , var_dump($_POST) , '</pre>';
//        echo '<pre>' , var_dump($_FILES) , '</pre>';


    }
}