<?php

use App\Core\Flash;

$flash = Flash::get();
ob_start();
?>

<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-5">
            <h1 class="mb-4">Login</h1>
            <form method="POST" action="/login" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = "Login";
require __DIR__ . '/../layout.php';
?>
