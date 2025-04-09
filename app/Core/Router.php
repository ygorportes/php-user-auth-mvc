<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\UserController;

class Router
{
    public function handleRequest()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/');

        switch ($uri) {
            case '':
            case '/':
                echo "Home";
                break;
            case '/usuarios':
                $controller = new UserController();
                $controller->index();
                break;
            case '/login':
                $controller = new AuthController();
                $controller->login();
                break;
            case '/usuarios/create':
                $controller = new UserController();
                $controller->create();
                break;
            case '/usuarios/store':
                $controller = new UserController();
                $controller->store();
                break;
            default:
                http_response_code(404);
                echo "Página não encontrada: $uri";
        }
    }
}