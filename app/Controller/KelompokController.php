<?php

namespace app\Controller;

use app\Core\View;

class KelompokController
{
    public function index() : void{
        View::RenderDashboard("Kelompok/index", [
            'title' => 'Kelompok',
            'page_type' => 'kelompok'
        ]);
    }
}