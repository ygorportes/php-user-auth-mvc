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

        User::store($name, $email);

        header("Location: /usuarios");
        exit();
    }
}