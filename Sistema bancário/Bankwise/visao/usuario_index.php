<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuários Cadastrados</title>
    <style>
        table { width: 80%; margin: auto; border-collapse: collapse; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #f0f0f0; }
        a { margin: 0 5px; text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Usuários Cadastrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= htmlspecialchars($u['usuario']) ?></td>
                <td>
                    <a href="UsuarioController.php?acao=editar&id=<?= $u['id'] ?>">Editar</a>
                    <a href="UsuarioController.php?acao=excluir&id=<?= $u['id'] ?>" onclick="return confirm('Excluir este usuário?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p style="text-align:center;"><a href="dashboard.php">Voltar</a></p>
</body>
</html>
