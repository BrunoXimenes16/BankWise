<?php
class Transacao {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function gerarQRCode($valor, $recebedor) {
        $dados = json_encode(['recebedor' => $recebedor, 'valor' => $valor]);
        return 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=' . urlencode($dados);
    }

    public function realizarTransacao($recebedor, $valor) {
        return true;
    }
}
?>