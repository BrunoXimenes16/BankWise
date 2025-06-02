<?php
require_once 'database.php';

class Usuario {
    private $conn;
    private $table = 'usuarios';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Create
    public function criar($nome, $email, $senha, $tipo_usuario = 'cliente') {
        $sql = "INSERT INTO $this->table (nome, email, senha, tipo_usuario) VALUES (:nome, :email, :senha, :tipo_usuario)";
        $stmt = $this->conn->prepare($sql);
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        return $stmt->execute();
    }

    // Read - Listar todos
    public function listar() {
        $sql = "SELECT id, nome, email, tipo_usuario, criado_em FROM $this->table ORDER BY nome";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read - Buscar por ID
    public function buscarPorId($id) {
        $sql = "SELECT id, nome, email, tipo_usuario FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function atualizar($id, $nome, $email, $tipo_usuario) {
        $sql = "UPDATE $this->table SET nome = :nome, email = :email, tipo_usuario = :tipo_usuario WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
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
