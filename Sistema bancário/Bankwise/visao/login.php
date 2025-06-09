<?php session_start(); $erro = $_SESSION['erro_login'] ?? ''; unset($_SESSION['erro_login']); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - BankWise</title>
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #3498db, #8e44ad);
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 20px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px; 
            align-items: center;
        }

        .input-group {
            position: relative;
            width: 100%;
        }

        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border-radius: 30px; 
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-weight: bold;
            border-radius: 30px; 
            cursor: pointer;
            transition: background 0.3s;
            font-size: 15px;
        }

        button:hover {
            background: #2980b9;
        }

        .erro {
            color: red;
            text-align: center;
            font-size: 14px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>BankWise</h2>
    <?php if ($erro): ?><div class="erro"><?= $erro ?></div><?php endif; ?>
    <form action="../controle/Autenticacao.php" method="post">
        <div class="input-group">
            <i class="fas fa-user"></i>
            <input type="text" name="usuario" placeholder="Usuário" required>
        </div>
        <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
