<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../modelo/Usuario.php';

$usuario = new Usuario($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $dados = $usuario->autenticar($login, $senha);
    if ($dados) {
        $_SESSION['usuario'] = $dados['usuario'];
        header('Location: ../visao/dashboard.php');
    } else {
        $_SESSION['erro_login'] = "Usuário ou senha inválidos.";
        header('Location: ../visao/login.php');
    }
    exit;
}
?>