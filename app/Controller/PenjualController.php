<?php

namespace app\Controller;

use app\Core\View;

class PenjualController
{
    public function index(){
        View::RenderDashboard("Penjual/index", [
            'title' => 'Penjual',
            'page_type' => 'penjual'
        ]);
    }
}