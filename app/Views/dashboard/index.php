<?php ob_start(); ?>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <h1>Painel Administrativo</h1>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-bg-primary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total de Usuários</h5>
                        <p class="card-text display-6"><?= $totalUsers ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($topDomains)): ?>
            <div class="row">
                <div class="col-md-8">
                    <h4>Top Domínios de E-mail</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Domínio</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($topDomains as $domain => $count): ?>
                            <tr>
                                <td><?= htmlspecialchars($domain) ?></td>
                                <td><?= $count ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php
$content = ob_get_clean();
$title = "Dashboard";
require __DIR__ . '/../layout.php';
