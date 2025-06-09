<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pagamento Pix</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #f7f9fa; padding-top: 40px; }
        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc; width: 300px; margin: auto; }
        img { margin: 20px 0; width: 200px; }
        .info { text-align: left; font-size: 16px; margin-bottom: 20px; }
        button { background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        a { margin-top: 15px; display: block; color: #333; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pagamento via Pix</h2>
        <?php if (isset($_SESSION['valor'])): ?>
            <img src="img/fake_qrcode.png" alt="QR Code Pix">
            <div class="info">
                <strong>Chave Pix:</strong> pague@bankwise.com<br>
                <strong>Valor:</strong> R$ <?= htmlspecialchars($_SESSION['valor']) ?><br>
                <strong>Recebedor:</strong> BankWise Tecnologia<br>
                <strong>Cidade:</strong> Brasília
            </div>
            <form action="pagamento_sucesso.php" method="post">
                <button type="submit">Confirmar Pagamento</button>
            </form>
        <?php else: ?>
            <p>Nenhum QR Code gerado.</p>
        <?php endif; ?>
        <a href="dashboard.php">Voltar</a>
    </div>
</body>
</html>
