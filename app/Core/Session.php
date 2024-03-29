<?php

namespace app\Core;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function Set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function Get($key)
    {
        return $_SESSION[$key] ?? false;
    }
    public function Remove($key)
    {
        unset($_SESSION[$key]);
    }
}