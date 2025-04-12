<?php
ob_start();
?>

<div class="container">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-10 mb-5">
            <div class="text-end">
                <a href="/usuarios/create" class="btn btn-primary btn-sm me-1">Criar Usuário</a>
            </div>
            <h1>Usuários cadastrados</h1>
            <form method="GET" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Buscar por nome" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>

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
                                <a href="/usuarios/show?id=<?= $user['id'] ?>" class="btn btn-info btn-sm me-1">Ver Detalhes</a>
                                <a href="/usuarios/delete?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm me-1" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
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
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Lista de Usuários";
require __DIR__ . '/../layout.php';
?>
