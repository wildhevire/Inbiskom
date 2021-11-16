<?php

namespace app\core;

class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }

    public function sendJSON($data)
    {
        echo json_encode($data);
    }
}