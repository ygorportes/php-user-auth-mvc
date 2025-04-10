<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários cadastrados</h1>

    <?php
    use App\Core\Flash;
    $flash = Flash::get();
    ?>

    <?php if ($flash): ?>
        <div style="padding: 10px; background: <?= $flash['type'] === 'error' ? '#f8d7da' : '#d4edda' ?>; color: #000; border: 1px solid #ccc; margin-bottom: 15px;">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= $user['id'] ?> - <?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['email']) ?>)
                <a href="/usuarios/edit?id=<?= $user['id'] ?>">[Editar]</a>
                <a href="/usuarios/delete?id=<?= $user['id'] ?>">[Excluir]</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="/usuarios/create">[Criar Usuário]</a>
</body>
</html>
