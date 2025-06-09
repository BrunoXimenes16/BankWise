<?php
require_once '../config/database.php';
require_once '../modelo/Usuario.php';

$usuarioObj = new Usuario($conn);

$acao = $_GET['acao'] ?? 'listar';

if ($acao === 'editar' && isset($_GET['id'])) {
    $usuario = $usuarioObj->buscarPorId($_GET['id']);
    include '../visao/usuario_editar.php';
} elseif ($acao === 'atualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioObj->atualizar($_POST['id'], $_POST['usuario'], $_POST['senha'] ?? null);
    header('Location: UsuarioController.php');
    exit;
} elseif ($acao === 'excluir' && isset($_GET['id'])) {
    $usuarioObj->excluir($_GET['id']);
    header('Location: UsuarioController.php');
    exit;
} else {
    $usuarios = $usuarioObj->listarTodos();
    include '../visao/usuario_index.php';
}
