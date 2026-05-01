<section class="content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Criar Serviço</h3>
                    </div>

                    <form method="POST" action="/salao-leila/public/services/store">
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="name">Nome do serviço</label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control"
                                       placeholder="Digite o nome do serviço"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Descrição</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          rows="3"
                                          placeholder="Descreva o serviço"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="duration">Duração (minutos)</label>
                                <input type="number"
                                       name="duration"
                                       id="duration"
                                       class="form-control"
                                       placeholder="Ex: 60"
                                       required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price">Preço</label>
                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       id="price"
                                       class="form-control"
                                       placeholder="Ex: 120.00"
                                       required>
                            </div>

                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="/salao-leila/public/services"
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