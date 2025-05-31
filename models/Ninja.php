<?php
require_once('../config/database.php');

class Ninja
{
    // Características/propriedades
    private $id;
    private $nome;
    private $preco;
    private $fragmentosAtual;
    private $fragmentosTotal;
    private $tabela;
    private $conn;

    // Construtor que inicializa a conexão com o banco
    public function __construct()
    {
        $this->conn = Database::connect(); // Conexão com o banco
    }

    // Métodos Getter e Setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setpreco($preco)
    {
        $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getFragmentosAtual()
    {
        return $this->fragmentosAtual;
    }

    public function setFragmentosAtual($fragmentosAtual)
    {
        $this->fragmentosAtual = filter_var($fragmentosAtual, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getFragmentosTotal()
    {
        return $this->fragmentosTotal;
    }

    public function setFragmentosTotal($fragmentosTotal)
    {
        $this->fragmentosTotal = filter_var($fragmentosTotal, FILTER_SANITIZE_NUMBER_INT);
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function setTabela($tabela)
    {
        $this->tabela = filter_var($tabela, FILTER_SANITIZE_SPECIAL_CHARS);
    }
















    // Método para atualizar as informações de um Ninja
public function atualizarNinja($id, $tabela,$ninja, $fragmentosAtual, $fragmentosTotal)
{
    // Valida se a tabela é permitida
    $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
    if (!in_array($tabela, $tabelasPermitidas)) {
        throw new Exception("Tabela não permitida.");
    }

    // Atualizando os dados do Ninja
    $query = "UPDATE $tabela SET fragmentos_atual = :fragAtual,   ninja = :ninja, fragmentos_total = :fragTotal WHERE id = :id";

    try {
        // Preparando a consulta SQL
        $stmt = $this->conn->prepare($query);
        
        // Bind dos parâmetros
        $stmt->bindParam(':fragAtual', $fragmentosAtual, PDO::PARAM_INT);
        $stmt->bindParam(':fragTotal', $fragmentosTotal, PDO::PARAM_INT);
        $stmt->bindParam(':ninja', $ninja, PDO::PARAM_STR);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executando a consulta
        $stmt->execute();

        // Verifica se a consulta afetou alguma linha
        if ($stmt->rowCount() > 0) {
            return "Dados atualizados com sucesso!";
        } else {
            return "Nenhum dado foi atualizado.";
        }
    } catch (PDOException $e) {
        return "Erro ao atualizar dados: " . $e->getMessage();
    }
}

// Método para excluir um ninja da tabela
public function excluirNinja($id, $tabela)
{
    // Valida se a tabela é permitida
    $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
    if (!in_array($tabela, $tabelasPermitidas)) {
        throw new Exception("Tabela não permitida.");
    }

    // Query para deletar o ninja
    $query = "DELETE FROM $tabela WHERE id = :id";

    try {
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return "Ninja excluído com sucesso!";
        } else {
            return "Nenhum ninja foi excluído. Verifique o ID.";
        }
    } catch (PDOException $e) {
        return "Erro ao excluir ninja: " . $e->getMessage();
    }
}








    public function buscarNinjaPorId($id, $tabela)
    {
        // Valida se a tabela é permitida
        $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
        if (!in_array($tabela, $tabelasPermitidas)) {
            throw new Exception("Tabela não permitida.");
        }
    
        // Consulta SQL para buscar o ninja pelo ID na tabela especificada
        $query = "SELECT * FROM $tabela WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        // Verifica se o ninja foi encontrado
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new Exception("Ninja não encontrado.");
        }
    
        return $result; // Retorna os dados encontrados
    }
    
    // Método para listar todos os Ninjas de uma tabela
    public function listarNinjas($tabela)
    {
        // Valida se a tabela é permitida
        $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
        if (!in_array($tabela, $tabelasPermitidas)) {
            throw new Exception("Tabela não permitida.");
        }

        // Consultando todos os Ninjas da tabela
        $query = "SELECT * FROM $tabela";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Retorna os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para listar todos os Ninjas com colunas específicas
    public function listarTodos($tabela, $colunas)
    {
        // Valida se a tabela é permitida
        $tabelasPermitidas = ['treino_sobrevivencia', 'pontos_sol', 'pontos_lua', 'pontos_guilda'];
        if (!in_array($tabela, $tabelasPermitidas)) {
            throw new Exception("Tabela não permitida.");
        }

        // Valida as colunas permitidas
        $colunasPermitidas = ['id', 'ninja', 'preco', 'fragmentos_atual', 'fragmentos_total'];

        foreach ($colunas as $coluna) {
            if (!in_array($coluna, $colunasPermitidas)) {
                throw new Exception("Coluna não permitida: $coluna");
            }
        }

        // Construir a query
        $colunasString = implode(", ", $colunas);
        $query = "SELECT $colunasString FROM $tabela";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
