<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if ($usuario && $senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $hash);

    try {
        $stmt->execute();
        $_SESSION['mensagem'] = "✅ Usuário cadastrado com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "❌ Erro: " . ($e->errorInfo[1] === 1062 ? "Usuário já existe." : $e->getMessage());
    }
} else {
    $_SESSION['mensagem'] = "❌ Preencha todos os campos.";
}

header("Location: ../visao/cadastro.php");
exit;
