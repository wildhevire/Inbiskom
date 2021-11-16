<?php

namespace app\core;

class ControllerBase
{
    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}