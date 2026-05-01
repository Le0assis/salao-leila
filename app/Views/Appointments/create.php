<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar serviçio</title>
</head>

<body>


    <form method="POST" action="/salao-leila/public/appointments/store">



        <input type="number" name="user_id" placeholder="ID do usuário">

        <input type="text" name="notes" placeholder="Comentário">

        <input type="datetime-local" name="scheduled_at">

        <?php foreach ($services as $service): ?>
            <label>
                <input type="checkbox" name="services[]" value="<?= $service['id'] ?>">
                <?= $service['name'] ?>
            </label><br>
        <?php endforeach; ?>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>