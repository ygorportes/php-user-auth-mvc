<?php
ob_start();
?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-8 mb-5">
            <h1>Usuários cadastrados</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>

                <?php foreach ($users as $user): ?>
                    <tbody>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td class="d-md-flex justify-content-center">
                                <a href="/usuarios/edit?id=<?= $user['id'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm me-1">Editar</button>
                                </a>
                                <a href="/usuarios/delete?id=<?= $user['id'] ?>">
                                    <button type="button" class="btn btn-danger btn-sm me-1" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1 ?>">Anterior</a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">Próxima</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <a href="/usuarios/create">
                <button type="button" class="btn btn-primary btn-sm me-1">Criar Usuário</button>
            </a>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Lista de Usuários";
require __DIR__ . '/../layout.php';
?>
