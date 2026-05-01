<h1>Detalhes do Agendamento</h1>

<div>
    <p><strong>ID:</strong> <?= $appointment['id'] ?></p>
    <p><strong>Usuário:</strong> <?= $appointment['user_id'] ?></p>
    <p><strong>Data:</strong> <?= $appointment['scheduled_at'] ?></p>
    <p><strong>Status:</strong> <?= $appointment['status'] ?></p>
    <p><strong>Observações:</strong> <?= $appointment['notes'] ?></p>
</div>

<br>

<a href="/salao-leila/public/appointments">Voltar</a>