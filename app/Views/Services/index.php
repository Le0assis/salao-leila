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