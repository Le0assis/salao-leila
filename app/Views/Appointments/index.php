<?php if (isset($_SESSION['error'])): ?>
    <div style="background:#f8d7da; color:#721c24; padding:10px; margin-bottom:15px; border-radius:5px;">
        <?= $_SESSION['error'] ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>

<body>

    <?php if (isset($_SESSION['error'])): ?>
        <div><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_GET['msg'])): ?>
        <div style="background:#fff3cd; padding:10px; margin-bottom:15px;">
            <?= htmlspecialchars($_GET['msg']) ?>
        </div>
    <?php endif; ?>

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
                            <a href="/salao-leila/public/appointments/show/<?= $appointment['id'] ?>">Ver detalhes</a>
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