<?php

namespace App\Middleware;

class AuthMiddleware
{
    public static function check()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: /login");
            exit;
        }
    }
}