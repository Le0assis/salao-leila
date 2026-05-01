<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>

<body>
    <?php if (!empty($appointments)): ?>
        <div class="row">
            <?php foreach ($appointments as $appointment):
                $total = 0
                    ?>
                <div class="col s6 m3">
                    <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                            <span class="card-title"><?= $appointment['scheduled_at'] ?>, <?= $appointment['status'] ?></span>
                            <br><br>
                            <p style="font: 48px;"> <strong>Serviços:</strong><br>

                                <?php if (!empty($appointment['services'])): ?>
                                    <?php foreach ($appointment['services'] as $service): ?>
                                        - <?= $service['name'] ?> (R$ <?= $service['price'] ?>)<br>
                                        <?php $total = $total + $service['price'] ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    Nenhum serviço vinculado
                                <?php endif; ?>
                            </p>
                            <br>
                        </div>
                        <div class="card-action">
                            <a href="/salao-leila/public/appointments/edit/<?= $appointment['id'] ?>">Editar Agendamento</a>
                            <a href="#">Total: <?= $total ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhum serviço encontrado.</p>
    <?php endif; ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>