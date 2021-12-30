<?php

namespace app\Core;

interface Middleware
{
    function execute(): void;
}