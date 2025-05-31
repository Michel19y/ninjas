<?php
require_once '../controllers/indexController.php'; 
require_once '../models/index.php'; 

$ninjaModel = new Index();

try {
    $tabela = 'pontos_sol'; // Apenas a tabela Sol
    $colunas = ['id', 'ninja', 'preco', 'fragmentos_atual', 'fragmentos_total'];
    $ninjas = $ninjaModel->listarTodos($tabela, $colunas);
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela Ninjas Sol</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/img/sol.png">
    <link rel="stylesheet" href="../assets/css/index.css" />
</head>
<body>
<div class="container my-4">
    <h2 class="text-center mb-4">Tabela Ninjas Sol</h2>
    <div class="text-center mb-4">
        <a href="tabela_lua.php"><img src="../assets/img/lua.png" class="link" alt="Tabela Lua"></a>
        <a href="tabela_guilda.php"><img src="../assets/img/guilda.png" class="link" alt="Tabela Guilda"></a>
        <a href="tabela_sobrevivencia.php"><img src="../assets/img/treino.png" class="link" alt="Tabela Treino"></a>
    </div>

    <?php if (isset($_GET['mensagem'])): ?>
        <div class="alert alert-<?= isset($_GET['erro']) ? 'danger' : 'success' ?> alert-dismissible fade show text-center mx-auto" style="max-width: 600px;" role="alert">
            <?= urldecode($_GET['mensagem']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <script>
            setTimeout(() => {
                const alerta = document.querySelector('.alert');
                if (alerta) alerta.remove();
            }, 5000);
        </script>
    <?php endif; ?>

    <?php if (!empty($ninjas)): ?>
        <div class="row">
            <?php foreach ($ninjas as $ninja): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center d-flex flex-column justify-content-between">
                            <h5 class="card-title"><?= htmlspecialchars($ninja['ninja']) ?></h5>
                            <p>
                                <?php 
                                $numEstrelas = match ($ninja['fragmentos_total']) {
                                    200 => 4,
                                    100, 80 => 3,
                                    50 => 2,
                                    default => 0
                                };
                                for ($i = 0; $i < $numEstrelas; $i++): ?>
                                    <img src="../assets/img/estrelas.png" alt="estrela" width="20" height="20">
                                <?php endfor; ?>
                            </p>
                            <p><strong>Preço:</strong> <?= htmlspecialchars($ninja['preco']) ?></p>
                            <p><strong>Fragmentos:</strong> <?= htmlspecialchars($ninja['fragmentos_atual']) ?> / <?= htmlspecialchars($ninja['fragmentos_total']) ?></p>
                             <p class="text-success fw-semibold">
                                <?php 
                                $faltaParaUpar = ($ninja['fragmentos_total'] - $ninja['fragmentos_atual']) * $ninja['preco'];
                                echo "Faltam: " . max($faltaParaUpar, 0) . " moedas para recrutar!";
                                ?>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="../controllers/NinjaController.php?op=editar&id=<?= htmlspecialchars($ninja['id']) ?>&tabela=<?= htmlspecialchars($tabela) ?>" class="btn btn-primary">
                                    Atualizar
                                </a>
                                <a href="../controllers/NinjaController.php?op=excluir&id=<?= htmlspecialchars($ninja['id']) ?>&tabela=<?= htmlspecialchars($tabela) ?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este ninja?')">
                                    Excluir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">Nenhum ninja encontrado.</div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
