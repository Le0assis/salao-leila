
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


<a href="/salao-leila/public/appointments/create">Marcar horario</a>
<br>
<a href="/salao-leila/public/appointments">Ver agendamentos</a>
<br>
<a href="/salao-leila/public/appointments/create">Editar horario</a>
<br>
<a href="/salao-leila/public/services/create">Criar Serviço</a>
<br>
<a href="/salao-leila/public/appointments/history">Buscar</a>