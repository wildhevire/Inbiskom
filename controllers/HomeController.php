<?php

namespace app\controllers;

class HomeController extends \app\core\ControllerBase
{
    public function index(){
        return $this->render('home');
    }
}