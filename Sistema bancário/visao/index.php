<?php
require_once './controller/AuthController.php';
$auth = new Autenticacao();
$page = $_GET['page'] ?? 'login';

if ($page === 'login') {
    $auth->login();
    exit;
}

if ($page === 'logout') {
    $auth->logout();
    exit;
}

if ($page === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth->register();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema Bancário</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">

<?php
session_start();
if ($page === 'register') {
?>
    <h2>Cadastro</h2>
    <form method="POST" action="index.php?page=register">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Cadastrar</button>
    </form>
    <a href="index.php?page=login">Voltar ao login</a>
<?php
} elseif ($page === 'dashboard' && isset($_SESSION['user'])) {
?>
    <h2>Bem-vindo, <?= $_SESSION['user']['nome'] ?></h2>
    <a href="index.php?page=logout">Sair</a>
<?php
} else {
    echo "<p>Página não encontrada ou acesso negado.</p>";
}
?>
</div>
</body>
</html>
