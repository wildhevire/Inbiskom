<?php

namespace app\controllers;

use app\core\Request;
use app\core\Response;

class HomeController extends \app\core\ControllerBase
{
    public function index(Request $request, Response $response)
    {
        return $this->render('home');
    }
}