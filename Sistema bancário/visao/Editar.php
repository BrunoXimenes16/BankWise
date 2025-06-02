<?php include './visao/template.php'; ?>
<div class="container">
    <h2>Editar Transação</h2>
    <form method="POST">
        <input type="number" name="amount" value="<?= $transacaoData['amount'] ?>" required>
        <input type="text" name="description" value="<?= $transacaoData['description'] ?>" required>
        <button type="submit">Salvar Alterações</button>
    </form>
</div>
