<?php
session_start();

use App\Core\Flash;

$flash = Flash::get();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Auth - PHP' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Auth - PHP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                        <li class="nav-item"><a class="nav-link" href="/">Início</a></li>
                        <li class="nav-item"><a class="nav-link" href="/usuarios">Usuários</a></li>
                        <li class="nav-item"><a class="nav-link" href="/logout">Sair</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (isset($flash) && $flash): ?>
            <div class="alert alert-<?= $flash['type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
                <?= htmlspecialchars($flash['message']) ?>
            </div>
        <?php endif; ?>

        <?= $content ?? '' ?>
    </div>
</body>
</html>
