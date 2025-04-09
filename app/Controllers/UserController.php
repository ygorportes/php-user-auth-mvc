<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();

        require_once __DIR__ . "/../Views/users/index.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../Views/users/create.php";
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];

        echo "Usuário salvo com sucesso! </br>";
        echo "Nome: " . htmlspecialchars($name) . "</br>";
        echo "Email: " . htmlspecialchars($email) . "</br>";

        echo '<a href="/usuarios">Voltar para a lista</a>';
    }
}