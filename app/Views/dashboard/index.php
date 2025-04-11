<?php ob_start(); ?>

    <div class="container mt-5">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10 text-center">
                <h1>Painel Administrativo</h1>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                <div class="card text-bg-primary shadow">
                    <div class="card-body">
                        <h5 class="card-title">Total de Usuários</h5>
                        <p class="card-text display-6"><?= $totalUsers ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($topDomains)): ?>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class="text-start">Top Domínios de E-mail</h4>
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
