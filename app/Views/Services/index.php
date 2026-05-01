<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="app\Views\Services\index.style.css">

    <title>Document</title>
</head>

<body>




    <?php if (!empty($services)): ?>
        <div class="row">
        <?php foreach ($services as $service): ?>
            <div class="col s3 m3">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title"><?= htmlspecialchars($service['name']) ?></span>
                        <p><?= htmlspecialchars($service['description']) ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#">R$ <?= number_format($service['price'], 2, ',', '.') ?></a>
                        <a href="#"><?= $service['duration'] ?> minutos</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum serviço encontrado.</p>
    <?php endif; ?>


    <a href="/salao-leila/public/appointments/create">Marcar horario</a>
    <br>
    <a href="/salao-leila/public/appointments">Ver agendamentos</a>
    <br>
    <a href="/salao-leila/public/services/create">Criar Serviço</a>
    <br>
    <a href="/salao-leila/public/appointments/history">Buscar</a>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>

<!-- https://materializecss.com/cards.html -->