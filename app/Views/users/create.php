<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <h1>Cadastrar Novo Usuário</h1>

    <?php
    use App\Core\Flash;
    $flash = Flash::get();
    ?>

    <?php if ($flash): ?>
        <div style="padding: 10px; background: <?= $flash['type'] === 'error' ? '#f8d7da' : '#d4edda' ?>; color: #000; border: 1px solid #ccc; margin-bottom: 15px;">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <form action="/usuarios/store" method="post">
        <label>Nome:</label>
        <input type="text" name="name"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <button type="submit">Salvar</button>
    </form>

    <a href="/usuarios">← Voltar para a lista</a>
</body>
</html>
