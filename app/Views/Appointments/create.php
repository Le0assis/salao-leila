<section class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Criar Agendamento</h3>
                    </div>

                    <form method="POST" action="/salao-leila/public/appointments/store">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="user_id">ID do Usuário</label>
                                <input type="number"
                                       name="user_id"
                                       id="user_id"
                                       class="form-control"
                                       placeholder="Digite o ID do usuário"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="notes">Comentário</label>
                                <textarea name="notes"
                                          id="notes"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Observações sobre o agendamento"></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="scheduled_at">Data e Hora</label>
                                <input type="datetime-local"
                                       name="scheduled_at"
                                       id="scheduled_at"
                                       class="form-control"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Serviços</label>

                                <div class="row">
                                    <?php foreach ($services as $service): ?>
                                        <div class="col-md-6 mb-2 ps-10">
                                            <div class="border rounded p-3 d-flex align-items-center">
                                                <input class="mr-3"
                                                       type="checkbox"
                                                       name="services[]"
                                                       value="<?= $service['id'] ?>"
                                                       id="service_<?= $service['id'] ?>">

                                                <label class="mb-0"
                                                       for="service_<?= $service['id'] ?>">
                                                    <strong><?= $service['name'] ?></strong>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="/salao-leila/public/appointments"
                               class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Salvar
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>