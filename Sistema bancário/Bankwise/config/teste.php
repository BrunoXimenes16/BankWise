<?php
$host = 'localhost';
$db = 'bankwise';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$usuario = 'admin';
$senhaDigitada = '123456';

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
$stmt->bindParam(':usuario', $usuario);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData) {
    if (password_verify($senhaDigitada, $userData['senha'])) {
        echo "✅ Login OK - Senha correta!";
    } else {
        echo "❌ Senha incorreta!";
    }
} else {
    echo "❌ Usuário não encontrado!";
}
?>
