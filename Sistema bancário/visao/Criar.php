<?php include './visao/template.php'; ?>
<div class="container">
    <h2>Criar Transação</h2>
    <form method="POST">
        <input type="number" name="amount" placeholder="Valor" required>
        <input type="text" name="description" placeholder="Descrição" required>
        <button type="submit">Criar</button>
    </form>
</div>
