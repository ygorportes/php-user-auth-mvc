<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>

    <?php
    use App\Core\Flash;
    $flash = Flash::get();
    ?>

    <?php if ($flash): ?>
        <div style="padding: 10px; background: <?= $flash['type'] === 'error' ? '#f8d7da' : '#d4edda' ?>; color: #000; border: 1px solid #ccc; margin-bottom: 15px;">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <form action="/usuarios/update" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>">

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
