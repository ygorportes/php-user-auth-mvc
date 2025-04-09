<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários cadastrados</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= $user['id'] ?> - <?= htmlspecialchars($user['name']) ?> (<?= htmlspecialchars($user['email']) ?>)
                <a href="/usuarios/delete?id=<?= $user['id'] ?>">[Excluir]</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
