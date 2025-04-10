<?php

namespace App\Controllers;

use App\Middleware\AuthMiddleware;
use App\Models\User;

class DashboardController
{
    public function index()
    {
        AuthMiddleware::check();

        $users = User::all();
        $totalUsers = count($users);

        $emailDomains = [];

        foreach ($users as $user) {
            $parts = explode("@", $user['email']);
            if (isset($parts[1])) {
                $domain = $parts[1];
                $emailDomains[$domain] = ($emailDomains[$domain] ?? 0) + 1;
            }
        }

        arsort($emailDomains);
        $topDomains = array_slice($emailDomains, 0, 5, true);

        require_once __DIR__ . "/../Views/dashboard/index.php";
    }
}