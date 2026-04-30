
<?php if (!empty($services)): ?>
    <?php foreach ($services as $service): ?>
        <div>
            <strong><?= htmlspecialchars($service['name']) ?></strong><br>
            <?= htmlspecialchars($service['description']) ?><br>
            R$ <?= number_format($service['price'], 2, ',', '.') ?><br>
            Duracao: <?= $service['duration'] ?> minutos
            <hr>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhum serviço encontrado.</p>
<?php endif; ?>


<a href="/salao-leila/public/Appointments/create">Marcar horario</a>

<a href="/salao-leila/public/Appointments/index">Ver agendamentos</a>

<a href="/salao-leila/public/services/create">Criar Serviço</a>
