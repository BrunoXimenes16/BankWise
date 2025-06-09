<?php 
session_start(); 
if (!isset($_SESSION['usuario'])) { 
    header("Location: login.php"); 
    exit; 
} 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f0f4f8;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 2.5rem;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 30px;
            max-width: 400px;
            width: 100%;
        }

        input[type="number"] {
            flex: 1;
            padding: 12px 15px;
            font-size: 1rem;
            border: 2px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            padding: 12px 25px;
            background-color: #3498db;
            color: #fff;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 600;
        }

        button:hover {
            background-color: #2980b9;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

        p a {
            color: #3498db;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        /* Responsividade */
        @media (max-width: 480px) {
            form {
                flex-direction: column;
            }

            button {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Bem-vindo, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h1>
    <form action="../controle/QrCodeController.php" method="post">
        <input type="number" name="valor" placeholder="Valor para gerar QR Code" required>
        <button type="submit">Gerar QR Code</button>
    </form>
    <p>
        <a href="gerar_qrcode.php">Ver QR Code</a> | 
        <a href="ler_qrcode.php">Ler QR Code</a> | 
        <a href="logout.php">Sair</a>
    </p>
</body>
</html>
