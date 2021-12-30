<?php

namespace app\Middleware;

use app\Core\Middleware;
use app\Core\Session;
use app\Core\View;

class MustNotLoginMiddleware implements Middleware
{
    private Session $session;
    public function __construct()
    {
        $this->session = new Session();
    }

    function execute(): void
    {
        $username = $this->session->Get('username');
        if($username)
        {
            View::Redirect('/dashboard-home');
        }
    }
}