<?php
require_once('../models/Ninja.php');

// Determina a operação
$operacao = $_REQUEST['op'] ?? '';

switch ($operacao) {
    case 'editar':
        editar();
        break;
    case 'atualizar':
        atualizar();
        break;
    case 'excluir':
        excluir();
        break;
    default:
        header('Location: ../index.php?erro=Operação inválida');
        exit;
}

// Editar ninja
function editar() {
    if (!isset($_GET['id'], $_GET['tabela']) || !is_numeric($_GET['id'])) {
        header('Location: ../index.php?erro=1');
        exit;
    }

    $id = intval($_GET['id']);
    $tabela = htmlspecialchars(trim($_GET['tabela']), ENT_QUOTES, 'UTF-8');

    $ninjas = new Ninja();

    try {
        $ninja = $ninjas->buscarNinjaPorId($id, $tabela);
        require_once('../views/atualizar_lua.php');
    } catch (Exception $e) {
        echo "Erro ao buscar ninja: " . $e->getMessage();
        exit;
    }
}

// Atualizar ninja
function atualizar() {
    if (
        empty($_POST['tabela']) || empty($_POST['id']) || empty($_POST['ninja']) ||
        !isset($_POST['fragmentos_atual'], $_POST['fragmentos_total'])
    ) {
        header('Location: ../index.php?erro=1');
        exit;
    }

    $id = intval($_POST['id']);
    $ninja = htmlspecialchars(trim($_POST['ninja']), ENT_QUOTES, 'UTF-8');
    $fragmentosAtual = intval($_POST['fragmentos_atual']);
    $fragmentosTotal = intval($_POST['fragmentos_total']);
    $tabela = htmlspecialchars(trim($_POST['tabela']), ENT_QUOTES, 'UTF-8');

    $ninjaModel = new Ninja();

    try {
        $ninjaAtual = $ninjaModel->buscarNinjaPorId($id, $tabela);
        $fragmentosAnterior = $ninjaAtual['fragmentos_atual'] ?? 0;
        $up = $fragmentosAtual - $fragmentosAnterior;

        $resultado = $ninjaModel->atualizarNinja($id, $tabela, $ninja, $fragmentosAtual, $fragmentosTotal);

        if ($resultado === "Dados atualizados com sucesso!") {
            $nomesTabelas = [
                "pontos_lua" => "lua",
                "pontos_sol" => "sol",
                "pontos_guilda" => "guilda",
                "treino_sobrevivencia" => "treino"
            ];
            $tabelaNome = $nomesTabelas[$tabela] ?? $tabela;
            $mensagem = "O ninja <strong>$ninja</strong> da tabela <strong>$tabelaNome</strong> foi atualizado com <strong>$up fragmentos</strong>.";

            header("Location: ../views/index.php?sucesso=1&mensagem=" . urlencode($mensagem));
            exit;
        } else {
            throw new Exception("Erro ao atualizar ninja.");
        }
    } catch (Exception $e) {
        header('Location: ../index.php?erro=' . urlencode($e->getMessage()));
        exit;
    }
}

// Excluir ninja
function excluir() {
   if ($_GET['op'] === 'excluir' && isset($_GET['id']) && isset($_GET['tabela'])) {
    require_once '../models/Ninja.php';

    $ninjaModel = new Ninja();
    try {
        $mensagem = $ninjaModel->excluirNinja($_GET['id'], $_GET['tabela']);
        header("Location: ../views/tabela_sol.php?mensagem=" . urlencode($mensagem));
    } catch (Exception $e) {
        header("Location: ../views/tabela_sol.php?mensagem=" . urlencode($e->getMessage()) . "&erro=1");
    }
}

}
?>
