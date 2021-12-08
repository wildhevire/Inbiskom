<?php

namespace app\Middleware;

interface Middleware
{

    function before(): void;

}