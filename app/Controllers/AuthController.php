<?php

namespace App\Controllers;

use App\Core\Flash;

class AuthController
{
    public function showLogin()
    {
        require_once __DIR__ . "/../Views/auth/login.php";
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Simples validação fake
        if ($email === 'admin@admin.com' && $password === 'admin123') {
            $_SESSION['logged_in'] = true;
            Flash::set("Login realizado com sucesso!");
            header("Location: /");
            exit;
        }

        Flash::set("Credenciais invalidas.", "error");
        header("Location: /login");
        exit;

    }

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit;
    }
}