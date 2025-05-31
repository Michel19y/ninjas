<?php
require_once '../models/index.php';

class IndexController
{
    private $ninjaModel;

    public function __construct()
    {
        $this->ninjaModel = new Index();
    }

    public function listar()
    {
        $tabela = isset($_GET['tabela']) ? $_GET['tabela'] : 'todas';
        $tabelas = ['pontos_sol', 'pontos_lua', 'pontos_guilda', 'treino_sobrevivencia'];
        $colunas = ['id', 'ninja', 'preco', 'fragmentos_atual', 'fragmentos_total'];
        $todosNinjas = [];

        try {
            foreach ($tabelas as $tabelaAtual) {
                if ($tabela === 'todas' || $tabela === $tabelaAtual) {
                    $todosNinjas[$tabelaAtual] = $this->ninjaModel->listarTodos($tabelaAtual, $colunas);
                }
            }
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }

        return $todosNinjas;
    }
}
