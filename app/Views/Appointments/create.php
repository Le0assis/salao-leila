<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar serviçio</title>
</head>

<body>
    <form method="POST" action="/salao-leila/public/Appointments/store">
        <input type="text" name="name" placeholder="Nome do serviço">

        <input type="text" name="description" placeholder="descrição">
        <input type="number" name="duration" placeholder="duração">
        <input type="number" name="price" placeholder="preço">

        <button type="submit">Salvar</button>
    </form>
</body>

</html>