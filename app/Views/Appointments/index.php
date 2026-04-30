<?php if (!empty($appointments)):
    foreach ($appointments as $appointment):
        $total = 0
            ?>

        <div>
            <strong>Cliente ID: <?= $appointment['user_id'] ?></strong><br>
            Data: <?= $appointment['scheduled_at'] ?><br>
            Status: <?= $appointment['status'] ?><br>

            <br><br>

            <strong>Serviços:</strong><br>

            <?php if (!empty($appointment['services'])): ?>
                <?php foreach ($appointment['services'] as $service): ?>
                    - <?= $service['name'] ?> (R$ <?= $service['price'] ?>)<br>
                    <?php $total = $total + $service['price'] ?>
                <?php endforeach; ?>
            <?php else: ?>
                Nenhum serviço vinculado
            <?php endif; ?>

            Total: <?= $total ?>
            <br>
            <a href="/salao-leila/public/appointments/edit/<?= $appointment['id'] ?>">Editar Agendamento</a>
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhum serviço encontrado.</p>
<?php endif; ?>