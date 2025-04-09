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
}