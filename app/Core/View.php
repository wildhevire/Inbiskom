<?php

namespace app\Core;

class View
{
    public static function renderDashboard(string $view, $model)
    {
        require __DIR__ . '/../View/template-dashboard/header.php';
        require __DIR__ . '/../View/template-dashboard/navbar.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/template-dashboard/footer.php';
    }

    public static function renderKatalog(string $view, $model)
    {
        require __DIR__ . '/../View/template-katalog/header.php';
        require __DIR__ . '/../View/template-katalog/navbar.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/template-katalog/footer.php';
    }
}