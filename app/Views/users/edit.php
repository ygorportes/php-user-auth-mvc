<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
<h1>Editar Usuário</h1>

<form action="/usuarios/update" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">

    <label for="name">Nome:</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>

    <button type="submit">Atualizar</button>
</form>
</body>
</html>
