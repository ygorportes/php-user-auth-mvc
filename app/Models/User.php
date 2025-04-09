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
}