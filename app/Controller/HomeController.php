<?php

namespace app\Controller;

use app\Core\View;


use app\Config\Database;

class HomeController
{
    public function index() : void{
        View::render("Home/index", [
            'title' => 'Home'
        ]);
    }

}