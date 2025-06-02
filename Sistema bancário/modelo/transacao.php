<?php
require_once 'database.php';

class Transacao {
    private $conn;
    private $table = 'transacoes';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create
    public function criar($conta_id, $tipo_transacao, $valor, $descricao = null) {
        $sql = "INSERT INTO $this->table (conta_id, tipo_transacao, valor, descricao) VALUES (:conta_id, :tipo_transacao, :valor, :descricao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':conta_id', $conta_id, PDO::PARAM_INT);
        $stmt->bindParam(':tipo_transacao', $tipo_transacao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    // Read - Listar todas as transações
    public function listar() {
        $sql = "SELECT * FROM $this->table ORDER BY data_transacao DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read - Buscar por ID
    public function buscarPorId($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function atualizar($id, $tipo_transacao, $valor, $descricao) {
        $sql = "UPDATE $this->table SET tipo_transacao = :tipo_transacao, valor = :valor, descricao = :descricao WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tipo_transacao', $tipo_transacao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Delete
    public function deletar($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Relatório com JOIN entre usuários, contas e transações
    public function relatorioCompleto() {
        $sql = "SELECT 
                    t.id AS transacao_id,
                    u.nome AS nome_usuario,
                    u.email,
                    c.numero_conta,
                    c.tipo_conta,
                    t.tipo_transacao,
                    t.valor,
                    t.descricao,
                    t.data_transacao
                FROM transacoes t
                JOIN contas c ON t.conta_id = c.id
                JOIN usuarios u ON c.usuario_id = u.id
                ORDER BY t.data_transacao DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
