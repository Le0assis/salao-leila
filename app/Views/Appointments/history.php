<h1>Histórico de Agendamentos</h1>

<form method="GET" action="/salao-leila/public/appointments/history">
    <input type="date" name="start">
    <input type="date" name="end">
    <button type="submit">Buscar</button>
</form>

<hr>

<?php foreach ($appointments as $appointment): ?>
    <div>
        <strong>ID: <?= $appointment['id'] ?></strong><br>
        Data: <?= $appointment['scheduled_at'] ?><br>
        Status: <?= $appointment['status'] ?><br>
    </div>
    <hr>
<?php endforeach; ?>