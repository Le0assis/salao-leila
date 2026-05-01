<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="/salao-leila/public/css/appointment-list-style.css">
    <title>Document</title>
</head>

<body>
    <?php echo __DIR__ ?>
    <!-- From Uiverse.io by kamehame-ha -->
    <?php if (!empty($appointments)): ?>
        <div class="cards" >
            <?php foreach ($appointments as $appointment):
                $total = 0
                    ?>
                <div class="card red" class="col s6 m3">
                    <p class="tip"><?= $appointment['scheduled_at'] ?>, <?= $appointment['status'] ?></p>
                    <p class="second-text">
                        <strong>Serviços:</strong><br>
                        <?php if (!empty($appointment['services'])): ?>
                            <?php foreach ($appointment['services'] as $service): ?>
                                - <?= $service['name'] ?> (R$ <?= $service['price'] ?>)<br>
                                <?php $total = $total + $service['price'] ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            Nenhum serviço vinculado
                        <?php endif; ?>
                    </p>
                    <br>/p>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Nenhum serviço encontrado.</p>
        <?php endif; ?>



</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>


\