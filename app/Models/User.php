<?php

namespace App\Models;

class User
{
    public static function all()
    {
        return [
            ['id' => 1, 'name' => 'Ygor Portes', 'email' => 'ygor@example.com'],
            ['id' => 2, 'name' => 'Maria Dev', 'email' => 'maria@example.com'],
            ['id' => 3, 'name' => 'João Script', 'email' => 'joao@example.com']
        ];
    }
}