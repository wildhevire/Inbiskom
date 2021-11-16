<?php

namespace app\core;

class Response
{
    public function statusCode(int $code)
    {
        http_response_code($code);
    }
}