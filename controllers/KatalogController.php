<?php

namespace app\controllers;

use app\core\ControllerBase;

class KatalogController extends ControllerBase
{
    public function index()
    {
        $data = [
            'title' => 'Katalog',
            'products' => [
                'BUKU', "RUMAH", "Mobil"
            ]
        ];
        return $this->render('katalog', $data);
    }
}