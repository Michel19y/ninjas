<?php
require_once '../controllers/indexController.php'; 
require_once '../models/index.php'; 

$ninjaModel = new Index();

try {
    $tabela = 'treino_sobrevivencia'; 
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
    <title>Tabela Ninjas Treino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/img/treino.png">
    <link rel="stylesheet" href="../assets/css/index.css" />
</head>
<body>
<div class="container my-5">
    <h2 class="text-center mb-4">Tabela Ninjas Teste de Sobrevivência</h2>

    <div class="text-center mb-5">
        <a href="index.php" class="mx-2">
            <img src="../assets/img/sol.png" class="link" alt="Ninjas do Sol" width="40">
        </a>
        <a href="tabela_guilda.php" class="mx-2">
            <img src="../assets/img/guilda.png" class="link" alt="Ninjas da Guilda" width="40">
        </a>
        <a href="tabela_lua.php" class="mx-2">
            <img src="../assets/img/lua.png" class="link" alt="Ninjas da Lua" width="40">
        </a>
    </div>

    <?php if (!empty($ninjas)): ?>
        <div class="row">
            <?php foreach ($ninjas as $ninja): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
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
                                    <img src="../assets/img/estrelas.png" alt="Estrela" width="20" height="20">
                                <?php endfor; ?>
                            </p>
                            <p><strong>Preço:</strong> <?= htmlspecialchars($ninja['preco']) ?></p>
                            <p><strong>Fragmentos:</strong> <?= htmlspecialchars($ninja['fragmentos_atual']) ?> / <?= htmlspecialchars($ninja['fragmentos_total']) ?></p>
                            <p class="text-success fw-semibold">
                                <?php 
                                $faltaParaUpar = ($ninja['fragmentos_total'] - $ninja['fragmentos_atual']) * $ninja['preco'];
                                echo "Faltam: " . ($faltaParaUpar >= 0 ? $faltaParaUpar : 0) . " moedas para recrutar!";
                                ?>
                            </p>
                            <div class="d-grid gap-2">
                                <a href="../controllers/NinjaController.php?op=editar&id=<?= htmlspecialchars($ninja['id']) ?>&tabela=<?= htmlspecialchars($tabela) ?>" class="btn btn-primary">
                                    Atualizar
                                </a>
                                <button 
                                    class="btn btn-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteModal" 
                                    data-id="<?= htmlspecialchars($ninja['id']) ?>" 
                                    data-nome="<?= htmlspecialchars($ninja['ninja']) ?>" 
                                    data-tabela="<?= htmlspecialchars($tabela) ?>"
                                >
                                    Excluir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">Nenhum ninja encontrado.</div>
    <?php endif; ?>
</div>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja excluir o ninja <strong id="ninjaNome"></strong>?</p>
      </div>
      <div class="modal-footer">
        <a href="#" id="btnConfirmDelete" class="btn btn-danger">Excluir</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap + Modal Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const confirmModal = document.getElementById('confirmDeleteModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const ninjaId = button.getAttribute('data-id');
        const ninjaNome = button.getAttribute('data-nome');
        const tabela = button.getAttribute('data-tabela');

        const nomeSpan = confirmModal.querySelector('#ninjaNome');
        const confirmBtn = confirmModal.querySelector('#btnConfirmDelete');

        nomeSpan.textContent = ninjaNome;
        confirmBtn.href = `../controllers/NinjaController.php?op=excluir&id=${ninjaId}&tabela=${tabela}`;
    });
</script>
</body>
</html>
