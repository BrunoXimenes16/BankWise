<?php
require_once './modelo/Transacao.php';

class Controletransacao {
    public function create($usuarioId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transacao = new Transacao();
            $transacao->create($usuarioId, $_POST['amount'], $_POST['description']);
            header("Location: index.php?page=dashboard");
        } else {
            include './visao/criar.php';
        }
    }

    public function edit($id) {
        $transacao = new Transacao();
        $transacaoData = $transacao->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transacao->update($id, $_POST['amount'], $_POST['description']);
            header("Location: index.php?page=dashboard");
        } else {
            include './visao/editar.php';
        }
    }

    public function delete($id) {
        $transacao = new Transacao();
        $transacao->delete($id);
        header("Location: index.php?page=dashboard");
    }

    public function list($usuarioId) {
        $transacao = new Transacao();
        $transacoes = $transacao->getAll($usuarioId);
        include './visao/lista.php';
    }

    public function report($usuarioId) {    
        $transacao = new Transacao();
        $transacoes = $transacao->getAll($usuarioId);
        include './visao/reportar.php';
    }
}
?>
