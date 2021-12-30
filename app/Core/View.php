<?php

namespace app\Core;

class View
{
    public static function RenderDashboard(string $view, $model)
    {
        require __DIR__ . '/../View/template-dashboard/header.php';
        require __DIR__ . '/../View/template-dashboard/navbar.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/template-dashboard/footer.php';
    }

    public static function RenderKatalog(string $view, $model)
    {
        require __DIR__ . '/../View/template-katalog/header.php';
        require __DIR__ . '/../View/template-katalog/navbar.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/template-katalog/footer.php';
    }

    public static function RenderHtml(string $view, $model){
        require __DIR__ . '/../View/' . $view . '.php';
    }

    public static function Redirect($url){
        header("Location: $url");
        exit();
    }
}