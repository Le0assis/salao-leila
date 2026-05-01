<h1>Histórico de Agendamentos</h1>


<a href="/salao-leila/public/appointments/history/week">Agendamentos da Semana</a>

<a href="/salao-leila/public/appointments/history/month">Agendamentos do Mês</a>
<hr>

<?php foreach ($appointments as $appointment): ?>
    <div>
        <strong>ID: <?= $appointment['id'] ?></strong><br>
        Data: <?= $appointment['scheduled_at'] ?><br>
        Status: <?= $appointment['status'] ?><br>
    </div>
    <hr>
<?php endforeach; ?>