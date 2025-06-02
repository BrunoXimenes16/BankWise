<?php
require_once 'database.php';

class Conta {
    private $conn;
    private $table = 'contas';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create
    public function criar($usuario_id, $numero_conta, $tipo_conta, $saldo = 0.00) {
        $sql = "INSERT INTO $this->table (usuario_id, numero_conta, tipo_conta, saldo) VALUES (:usuario_id, :numero_conta, :tipo_conta, :saldo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(':numero_conta', $numero_conta);
        $stmt->bindParam(':tipo_conta', $tipo_conta);
        $stmt->bindParam(':saldo', $saldo);
        return $stmt->execute();
    }

    // Read - Listar todos
    public function listar() {
        $sql = "SELECT * FROM $this->table ORDER BY id";
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
    public function atualizar($id, $numero_conta, $tipo_conta, $saldo) {
        $sql = "UPDATE $this->table SET numero_conta = :numero_conta, tipo_conta = :tipo_conta, saldo = :saldo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':numero_conta', $numero_conta);
        $stmt->bindParam(':tipo_conta', $tipo_conta);
        $stmt->bindParam(':saldo', $saldo);
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
}
