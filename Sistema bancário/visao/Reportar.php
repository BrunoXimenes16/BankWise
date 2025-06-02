<?php include './visao/template.php'; ?>
<div class="container">
    <h2>Relatório de Transações</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transacoes as $transacao): ?>
            <tr>
                <td><?= $transacao['id'] ?></td>
                <td><?= $transacao['amount'] ?></td>
                <td><?= $transacao['description'] ?></td>
                <td><?= $transacao['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
