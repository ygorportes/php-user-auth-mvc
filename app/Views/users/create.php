<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
</head>
<body>
<h1>Cadastrar Novo Usuário</h1>

<form action="/usuarios/store" method="post">
    <label>Nome:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <button type="submit">Salvar</button>
</form>

<a href="/usuarios">← Voltar para a lista</a>
</body>
</html>
