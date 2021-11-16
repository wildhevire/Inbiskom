<?php

namespace app\core;

class Router
{
    private array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct($req, $res)
    {
        $this->request = $req;
        $this->response = $res;
    }

    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $url = $this->request->getEndpoint();
        $callback = $this->routes[$method][$url] ?? false;

        if (!$callback)
        {
            $this->response->statusCode(404);
            return 'Not Found';
        }

        if (is_string($callback))
        {
            return $this->renderView($callback);
        }

        if (is_array($callback))
        {
            $controller = new $callback[0];
            //Application::$app->controller = $controller;
            $callback[0] = $controller;
        }

        return call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        foreach($params as $key => $value)
        {
            $$key = $value;
        }


        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}