<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Serviços</h1>

    <a href="/salao-leila/public/services/create" class="btn btn-success">
        Novo Serviço
    </a>
</div>


<section class="content">
    <div class="container-fluid">

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (!empty($services)): ?>
            <div class="row">
                <?php foreach ($services as $service): ?>
                    <div class="col-md-4">

                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">
                                    <?= htmlspecialchars($service['name']) ?>
                                </h3>
                            </div>

                            <div class="card-body">
                                <p>
                                    <?= htmlspecialchars($service['description']) ?>
                                </p>
                            </div>

                            <div class="card-footer">
                                <strong>
                                    R$ <?= number_format($service['price'], 2, ',', '.') ?>
                                </strong>

                                <span class="float-right">
                                    <?= $service['duration'] ?> minutos
                                </span>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        <?php else: ?>
            <div class="alert alert-info">
                Nenhum serviço encontrado.
            </div>
        <?php endif; ?>

    </div>
</section>