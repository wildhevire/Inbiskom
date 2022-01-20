<?php

namespace app\Controller;

use app\Core\View;

class KatalogHomeController
{
    public function index()
    {
        View::RenderKatalog("Katalog-Home/index", []);
    }
}