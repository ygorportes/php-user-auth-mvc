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

        $search = $_GET['search'] ?? null;
        $users = User::all();

        if ($search) {
            $users = array_filter($users, fn($user) =>
                stripos($user['name'], $search) !== false
            );
        }

        $perPage = 10;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $totalUsers = count($users);
        $totalPages = ceil($totalUsers / $perPage);
        $page = max(1, min($page, $totalPages));
        $offset = ($page - 1) * $perPage;

        $users = array_slice($users, $offset, $perPage);

        require_once __DIR__ . "/../Views/users/index.php";
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            header("Location: /usuarios");
            exit;
        }

        $user = User::find($id);

        if (!$user) {
            Flash::set("Usuário não encontrado", "error");
            header("Location: /usuarios");
            exit;
        }

        require_once __DIR__ . "/../Views/users/show.php";
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
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $birthdate = $_POST['birthdate'];

        if (empty($name) || empty($email) || empty($password)) {
            Flash::set("Nome, e-mail e senha são obrigatórios!", "error");
            header("Location: /usuarios/create");
            exit;
        }

        if (User::existsByEmail($email)) {
            Flash::set("Este email já está em uso.", "error");
            header("Location: /usuarios/create");
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        User::store($name, $email, $hashedPassword, $address, $phone, $birthdate);
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
        $address = $_POST['address'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $birthdate = $_POST['birthdate'] ?? '';

        if (empty($name) || empty($email)) {
            Flash::set("Nome e e-mail são obrigatórios.", "error");
            header("Location: /usuarios/edit?id=$id");
            exit;
        }

        if (User::existsByEmail($email, $id)) {
            Flash::set("Este email já está em uso por outro usuário.", "error");
            header("Location: /usuarios/edit?id=$id");
            exit;
        }

        if ($id !== null) {
            User::update($id, $name, $email, $address, $phone, $birthdate);
            Flash::set("Usuario atualizado com sucesso!");
        } else {
            Flash::set("ID inválido", "error");
        }

        header("Location: /usuarios/show?id=$id");
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            User::delete($id);
            Flash::set("Usuário excluído com sucesso!");
        }

        header("Location: /usuarios");
        exit;
    }
}