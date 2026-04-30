<h1>Editar Agendamento</h1>

<form method="POST" action="/salao-leila/public/appointments/update/<?= $appointment['id'] ?>">

    <label>Usuário:</label>
    <input type="number" name="user_id" value="<?= $appointment['user_id'] ?>">
    <br><br>

    <label>Data:</label>
    <input type="datetime-local" name="scheduled_at"
        value="<?= date('Y-m-d\TH:i', strtotime($appointment['scheduled_at'])) ?>">
    <br><br>

    <label>Status:</label>
    <input type="text" name="status" value="<?= $appointment['status'] ?>">
    <br><br>

    <label>Notas:</label>
    <textarea name="notes"><?= $appointment['notes'] ?></textarea>
    <br><br>
    
    <label>Confirmed:</label>
    <textarea name="confirmed"><?= $appointment['confirmed'] ?></textarea>
    <br><br>


    <button type="submit">Salvar Alterações</button>
</form>