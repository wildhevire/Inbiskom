<?php

namespace app\controllers;

use app\core\ControllerBase;
use app\core\Request;
use app\core\Response;

class KatalogController extends ControllerBase
{
    public function index(Request $request, Response $response)
    {
        $data = [
            'title' => "Katalog",
            'products' => [
                'BUKU', "RUMAH", "Mobil"
            ]
        ];

        echo "Method : ".$request->getMethod()."<br>";
        echo "JSON : ";
        $response->sendJSON($data);
        echo "<br>";
        echo "Rendered HTML Element : ";
        return $this->render('katalog', $data);
    }
}