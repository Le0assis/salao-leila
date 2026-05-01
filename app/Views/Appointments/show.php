<section class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Detalhes do Agendamento</h3>
                    </div>

                    <div class="card-body">

                        <div class="mb-3">
                            <strong>ID:</strong>
                            <span class="float-right"><?= $appointment['id'] ?></span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong>Usuário:</strong>
                            <span class="float-right"><?= $appointment['user_id'] ?></span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong>Data:</strong>
                            <span class="float-right"><?= $appointment['scheduled_at'] ?></span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong>Status:</strong>
                            <span class="badge badge-primary float-right">
                                <?= $appointment['status'] ?>
                            </span>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <strong>Observações:</strong>
                            <div class="mt-2 p-3 border rounded bg-light">
                                <?= !empty($appointment['notes']) ? $appointment['notes'] : 'Nenhuma observação.' ?>
                            </div>
                        </div>

                        <?php if (!empty($appointment['services'])): ?>
                            <hr>

                            <div class="mb-3">
                                <strong>Serviços vinculados:</strong>

                                <ul class="list-group mt-2">
                                    <?php foreach ($appointment['services'] as $service): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?= $service['name'] ?>
                                            <span class="badge badge-success">
                                                R$ <?= $service['price'] ?>
                                            </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="/salao-leila/public/appointments"
                           class="btn btn-secondary">
                            Voltar
                        </a>

                        <a href="/salao-leila/public/appointments/edit/<?= $appointment['id'] ?>"
                           class="btn btn-primary">
                            Editar
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>