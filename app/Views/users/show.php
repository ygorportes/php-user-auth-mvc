<?php ob_start(); ?>

    <div class="container mt-5">
        <h2>Detalhes do Usuário</h2>

        <div class="card mt-4 shadow">
            <div class="card-body">
                <p><strong>ID:</strong> <?= $user['id'] ?></p>
                <p><strong>Nome:</strong> <?= htmlspecialchars($user['name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <p><strong>Endereço:</strong> <?= htmlspecialchars($user['address'] ?? 'Não informado') ?></p>
                <p><strong>Telefone:</strong> <?= htmlspecialchars($user['phone'] ?? 'Não informado') ?></p>
                <p><strong>Data de Nascimento:</strong> <?= htmlspecialchars($user['birthdate'] ?? 'Não informado') ?></p>

                <a href="/usuarios" class="btn btn-secondary btn-sm mt-3">Voltar</a>
                <a href="/usuarios/edit?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm mt-3">Editar</a>
                <a href="/usuarios/delete?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm mt-3" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
$title = "Detalhes do Usuário";
require __DIR__ . '/../layout.php';
