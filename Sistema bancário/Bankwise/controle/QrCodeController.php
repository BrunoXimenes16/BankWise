<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../modelo/Transacao.php';

$transacao = new Transacao($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'] ?? 0;
    $usuario = $_SESSION['usuario'];
    $qr = $transacao->gerarQRCode($valor, $usuario);
    $_SESSION['qr_code'] = $qr;
     $_SESSION['valor'] = $valor;
    header("Location: ../visao/gerar_qrcode.php");
    exit;
}
?>