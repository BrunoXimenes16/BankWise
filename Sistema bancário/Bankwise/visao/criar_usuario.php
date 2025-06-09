<?php
// Conexão com o banco
$host = 'localhost';
$db = 'bankwise';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Dados do novo usuário
$novoUsuario = 'admin';
$novaSenha = '123456';

// Gerar o hash da senha
$hashSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

// Inserir no banco
$sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usuario', $novoUsuario);
$stmt->bindParam(':senha', $hashSenha);

try {
    $stmt->execute();
    echo "✅ Usuário '$novoUsuario' criado com sucesso!<br>";
    echo "Senha: $novaSenha (hash armazenado)";
} catch (PDOException $e) {
    echo "❌ Erro ao criar usuário: " . $e->getMessage();
}
?>
