<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Agendamentos</h1>

    <a href="/salao-leila/public/appointments/create" class="btn btn-success">
        Novo Agendamento
    </a>
</div>

<form method="GET" action="/salao-leila/public/appointments/history" class="mb-4">

    <div class="row g-3 align-items-end">

        <div class="col-md-3">
            <label for="start" class="form-label">Data inicial</label>
            <input type="date" name="start" id="start" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="end" class="form-label">Data final</label>
            <input type="date" name="end" id="end" class="form-control">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                Buscar
            </button>
        </div>

        <div class="col-md-2">
            <a href="/salao-leila/public/appointments/history/week"
               class="btn btn-info w-100">
                Semana
            </a>
        </div>

        <div class="col-md-2">
            <a href="/salao-leila/public/appointments/history/month"
               class="btn btn-secondary w-100">
                Mensal
            </a>
        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-2">
            <a href="/salao-leila/public/appointments"
               class="btn btn-outline-dark w-100">
                Limpar
            </a>
        </div>
    </div>

</form>

<section class="content">
    <div class="container-fluid">

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (!empty($_GET['msg'])): ?>
            <div class="alert alert-warning">
                <strong><?= htmlspecialchars($_GET['msg']) ?></strong>
            </div>
        <?php endif; ?>

        <?php if (!empty($appointments)): ?>
            <div class="row">

                <?php foreach ($appointments as $appointment): ?>
                    <?php $total = 0; ?>

                    <div class="col-md-6 col-lg-4 my-2">
                        <div class="card h-100 d-flex flex-column">

                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= $appointment['scheduled_at'] ?>
                                </h3>
                            </div>

                            <div class="card-body d-flex flex-column">

                                <p>
                                    <strong>Status:</strong>
                                    <?= $appointment['status'] ?>
                                </p>

                                <p>
                                    <strong>Serviços:</strong><br>
                                <div class="flex-grow-1">

                                    <?php if (!empty($appointment['services'])): ?>
                                        <?php foreach ($appointment['services'] as $service): ?>
                                            - <?= $service['name'] ?>
                                            (R$ <?= $service['price'] ?>)<br>

                                            <?php $total += $service['price']; ?>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        Nenhum serviço vinculado
                                    <?php endif; ?>

                                </div>
                                </p>

                            </div>

                            <div class="card-footer">
                                <a href="/salao-leila/public/appointments/edit/<?= $appointment['id'] ?>"
                                    class="btn btn-primary btn-sm">
                                    Editar
                                </a>

                                <a href="/salao-leila/public/appointments/show/<?= $appointment['id'] ?>"
                                    class="btn btn-info btn-sm">
                                    Detalhes
                                </a>

                                <span class="float-right">
                                    <strong>Total:</strong> R$ <?= $total ?>
                                </span>
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <div class="alert alert-info">
                Nenhum agendamento encontrado.
            </div>
        <?php endif; ?>

    </div>
</section>