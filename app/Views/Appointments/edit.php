<section class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Editar Agendamento</h3>
                    </div>

                    <form method="POST" action="/salao-leila/public/appointments/update/<?= $appointment['id'] ?>">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="user_id">Usuário</label>
                                <input type="number" name="user_id" id="user_id" class="form-control"
                                    value="<?= $appointment['user_id'] ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="scheduled_at">Data</label>
                                <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="form-control"
                                    value="<?= date('Y-m-d\TH:i', strtotime($appointment['scheduled_at'])) ?>" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">

                                    <option value="Agendado" <?= $appointment['status'] == 'Agendado' ? 'selected' : '' ?>>
                                        Agendado
                                    </option>

                                    <option value="Cancelado" <?= $appointment['status'] == 'Cancelado' ? 'selected' : '' ?>>
                                        Cancelado
                                    </option>

                                    <option value="Finalizado" <?= $appointment['status'] == 'Finalizado' ? 'selected' : '' ?>>
                                        Finalizado
                                    </option>

                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="notes">Notas</label>
                                <textarea name="notes" id="notes" class="form-control"
                                    rows="4"><?= $appointment['notes'] ?></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="confirmed">Confirmado</label>
                                <select name="confirmed" id="confirmed" class="form-control">
                                    <option value="1" <?= $appointment['confirmed'] ? 'selected' : '' ?>>
                                        Sim
                                    </option>
                                    <option value="0" <?= !$appointment['confirmed'] ? 'selected' : '' ?>>
                                        Não
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="/salao-leila/public/appointments" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</section>