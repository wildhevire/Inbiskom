<?php

namespace app\Controller;

use app\Core\View;


use app\Config\Database;

class DashboardController
{
    public function index() : void{
        View::RenderDashboard("Dashboard/index", [
            'title' => 'Home',
            'page_type' => 'dashboard'
        ]);
    }

}