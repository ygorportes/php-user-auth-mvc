<?php

namespace App\Models;

class User
{
    public static function all()
    {
        return $_SESSION['users'];
    }

    public static function store($name, $email)
    {
        $users = $_SESSION['users'] ?? [];

        $lastId = 0;
        if (!empty($users)) {
            $lastId = end($users);
            $lastId = $lastId['id'];
        }

        $users[] = [
            'id' => $lastId + 1,
            'name' => $name,
            'email' => $email
        ];

        $_SESSION['users'] = $users;
    }

    public static function find($id)
    {
        $users = $_SESSION['users'] ?? [];

        foreach ($users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }

        return null;
    }

    public static function update($id, $name, $email)
    {
        if (!isset($_SESSION['users'])) {
            return;
        };

        $updateUsers = [];

        foreach ($_SESSION['users'] as $user) {
            if ((int)$user['id'] === (int)$id) {
                $user['name'] = $name;
                $user['email'] = $email;
            }
            $updateUsers[] = $user;
        }

        $_SESSION['users'] = $updateUsers;
    }

    public static function delete($id)
    {
        $users = $_SESSION['users'] ?? [];

        $users = array_filter($users, fn($user) => $user['id'] != $id);

        $_SESSION['users'] = array_values($users);
    }
}