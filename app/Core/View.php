<?php

namespace app\Core;

class View
{
    public static function render(string $view, $model)
    {
        require __DIR__ . '/../View/template/header.php';
        require __DIR__ . '/../View/template/navbar.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/template/footer.php';
    }
}