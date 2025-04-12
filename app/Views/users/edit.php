<?php

ob_start();
?>

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">
            <h1 class="mb-4 text-center">Editar Usuário</h1>

            <form method="POST" action="/usuarios/update" class="card p-4 shadow-sm">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" required
                           value="<?= htmlspecialchars($user['name']) ?>">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required
                           value="<?= htmlspecialchars($user['email']) ?>">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Endereço:</label>
                    <input type="text" name="address" id="address" class="form-control"
                           value="<?= htmlspecialchars($user['address'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone:</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Data de Nascimento:</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control"
                           value="<?= htmlspecialchars($user['birthdate'] ?? '') ?>">
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="/usuarios/show?id=<?= $user['id'] ?>" class="btn btn-secondary mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Editar Usuário";
require __DIR__ . '/../layout.php';
?>
