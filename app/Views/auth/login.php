<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<?php if ($flash): ?>
    <div style="padding: 10px; background: <?= $flash['type'] === 'error' ? '#f8d7da' : '#d4edda' ?>; color: #000; border: 1px solid #ccc; margin-bottom: 15px;">
        <?= htmlspecialchars($flash['message']) ?>
    </div>
<?php endif; ?>

<form method="POST" action="/login">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Senha:</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Entrar</button>
</form>
</body>
</html>
