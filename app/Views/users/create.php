<?php

ob_start();
?>

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">
            <h1 class="mb-4 text-center">Criar Usuário</h1>

            <form method="POST" action="/usuarios/store" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="/usuarios" class="btn btn-secondary mt-2">Cancelar</a>
            </form>
        </div>
    </div>
</div>



<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>
