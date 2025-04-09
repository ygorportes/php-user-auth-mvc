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
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            header("Location: /usuarios");
            exit;
        }

        $user = User::find($id);

        require_once __DIR__ . "/../Views/users/edit.php";
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';

        if ($id !== null) {
            User::update($id, $name, $email);
        }
        print_r($_SESSION['users']);
        header("Location: /usuarios");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            User::delete($id);
        }

        header("Location: /usuarios");
        exit;
    }
}