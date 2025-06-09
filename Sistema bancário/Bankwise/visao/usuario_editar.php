<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
            display: flex;
            justify-content: center;
            padding: 40px 0;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 320px;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: normal;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #66afe9;
            outline: none;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Usuário</h2>
        <form action="UsuarioController.php?acao=atualizar" method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" value="<?= htmlspecialchars($usuario['usuario']) ?>" required>

            <label for="senha">Senha (deixe em branco para não alterar):</label>
            <input type="password" id="senha" name="senha" placeholder="Nova senha">

            <button type="submit">Atualizar</button>
        </form>
        <a href="UsuarioController.php" class="back-link">Voltar para lista</a>
    </div>
</body>
</html>
