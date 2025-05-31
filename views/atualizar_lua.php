<?php
require_once '../models/Ninja.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ninja</title>

    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/atualizar.css" />
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Editar Ninja</h2>

                <!-- Exibir mensagem de erro se houver -->
                <?php if (isset($erro) && $erro): ?>
                    <div class="alert alert-danger text-center">Ocorreu um erro ao atualizar os dados. Tente novamente.</div>
                <?php endif; ?>

                <!-- Formulário de edição -->
                <form action="../controllers/NinjaController.php" method="POST">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($ninja['id']) ?>">
                    <input type="hidden" name="tabela" value="<?= htmlspecialchars($tabela) ?>">

                    <div class="mb-3">
                        <label for="ninja" class="form-label">Nome do Ninja</label>
                        <input type="text" class="form-control" name="ninja" id="ninja" value="<?= htmlspecialchars($ninja['ninja']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="fragmentos_atual" class="form-label">Fragmentos Atuais</label>
                        <input type="number" class="form-control" name="fragmentos_atual" id="fragmentos_atual" value="<?= htmlspecialchars($ninja['fragmentos_atual']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="fragmentos_total" class="form-label">Fragmentos Totais</label>
                        <input type="number" class="form-control" name="fragmentos_total" id="fragmentos_total" value="<?= htmlspecialchars($ninja['fragmentos_total']) ?>" required>
                    </div>

                    <input type="hidden" name="op" value="atualizar">

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                    
                </form>
                   <div class="d-grid">
<button type="button" class="btn btn-primary" onclick="history.back()">Voltar</button>

</div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
