<?php

namespace App\Controllers;

use App\Core\Flash;
use App\Middleware\AuthMiddleware;
use App\Models\User;

class UserController
{
    public function index()
    {
        AuthMiddleware::check();

        $perPage = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $allUsers = User::all();

        $totalUsers = count($allUsers);
        $totalPages = ceil($totalUsers / $perPage);

        $page = max(1, min($page, $totalPages));

        $offset = ($page - 1) * $perPage;
        $users = array_slice($allUsers, $offset, $perPage);

        require_once __DIR__ . "/../Views/users/index.php";
    }

    public function create()
    {
        AuthMiddleware::check();
        require_once __DIR__ . "/../Views/users/create.php";
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if (empty($name) || empty($email)) {
            Flash::set("Todos os campos são obrigatórios!", "error");
            header("Location: /usuarios/create");
            exit;
        }

        if (User::existsByEmail($email)) {
            Flash::set("Este email já está em uso.", "error");
            header("Location: /usuarios/create");
            exit;
        }

        User::store($name, $email);
        Flash::set("Usuario cadastrado com sucesso!");
        header("Location: /usuarios");
        exit;
    }

    public function edit()
    {
        AuthMiddleware::check();

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

        if (empty($name) || empty($email)) {
            Flash::set("Todos os campos são obrigatórios.", "error");
            header("Location: /usuarios/edit?id=$id");
            exit;
        }

        if (User::existsByEmail($email, $id)) {
            Flash::set("Este email já está em uso por outro usuário.", "error");
            header("Location: /usuarios/edit?id=$id");
            exit;
        }

        if ($id !== null) {
            User::update($id, $name, $email);
            Flash::set("Usuario atualizado com sucesso!");
        } else {
            Flash::set("ID inválido", "error");
        }

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