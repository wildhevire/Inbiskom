<?php

namespace app\controllers;

class HomeController extends \app\core\ControllerBase
{
    public function index(){
        $data = [
            'title' => "Rumah"
        ];

        return $this->render('produk');
    }
}