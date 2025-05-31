<?php
require_once('../config/database.php');

class Index
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect(); // Conexão com o banco
    }

    public function listarTodos($tabela, $colunas)
    {
        // Validações
        $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
        if (!in_array($tabela, $tabelasPermitidas)) {
            throw new Exception("Tabela não permitida.");
        }

        $colunasPermitidas = ['id', 'ninja', 'preco', 'fragmentos_atual', 'fragmentos_total'];
        foreach ($colunas as $coluna) {
            if (!in_array($coluna, $colunasPermitidas)) {
                throw new Exception("Coluna não permitida: $coluna");
            }
        }

        $colunasString = implode(", ", $colunas);
        $query = "SELECT $colunasString FROM $tabela LIMIT 100"; // Limite para evitar consumo excessivo
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
