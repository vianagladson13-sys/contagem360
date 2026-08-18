<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/evento.css">

<section>

    <section class="py-5 bg-light">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="card shadow-lg border-0 rounded-4 position-relative">

                        <!-- Botão Fechar -->
                        <button type="button"
                            class="btn btn-fechar position-absolute top-0 end-0 m-3"
                            onclick="history.back()">

                            <i class="bi bi-x-lg fs-4"></i>

                        </button>

                        <div class="card-body p-5">

                            <h2 class="text-center fw-bold mb-4">
                                <i class="bi bi-calendar-event text-primary"></i>
                                Cadastro de Evento
                            </h2>

                            <form id="formEvento">

                                <div class="row">

                                    <div class="col-md-8 mb-3">

                                        <label for="nomeEvento" class="form-label">
                                            Nome do Evento
                                            <input type="text"
                                                class="form-control"
                                                id="nomeEvento"
                                                name="nomeEvento"
                                                placeholder="Digite o nome do evento">

                                            <div class="invalid-feedback">
                                                Informe o nome do evento.
                                            </div>

                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label for="categoria" class="form-label">
                                            Categoria
                                        </label>

                                        <select class="form-select" id="categoria" name="categoria">

                                            <option value="" selected>
                                                Selecione
                                            </option>

                                            <option>Show</option>
                                            <option>Festival</option>
                                            <option>Esportivo</option>
                                            <option>Cultural</option>
                                            <option>Feira</option>

                                        </select>

                                        <div class="invalid-feedback">
                                            Selecione uma categoria.
                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label for="dataEvento" class="form-label">
                                            Data
                                        </label>

                                        <input type="date" class="form-control" id="dataEvento" name="dataEvento">

                                        <div class="invalid-feedback">
                                            Informe a data.
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label for="horaEvento" class="form-label">
                                            Horário
                                        </label>

                                        <input type="time" class="form-control" id="horaEvento" name="horaEvento">

                                        <div class="invalid-feedback">
                                            Informe o horário.
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label for="localEvento" class="form-label">
                                        Local
                                    </label>

                                    <input type="text" class="form-control" id="localEvento" name="localEvento"
                                        placeholder="Ex.: Praça da Glória">

                                    <div class="invalid-feedback">
                                        Informe o local.
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label for="descricaoEvento" class="form-label">
                                        Descrição
                                    </label>

                                    <textarea class="form-control" rows="5" id="descricaoEvento" name="descricaoEvento"
                                        placeholder="Descreva o evento"></textarea>

                                    <div class="invalid-feedback">
                                        Informe uma descrição.
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">

                                        <label for="organizador" class="form-label">
                                            Organizador
                                        </label>

                                        <input type="text" class="form-control" id="organizador" name="organizador">
                                        <div class="invalid-feedback">
                                            Informe o nome do Organizador.
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label for="contato" class="form-label">
                                            Contato
                                        </label>

                                        <input type="tel" class="form-control" id="contato" name="contato"
                                            placeholder="(31) 99999-9999">
                                        <div class="invalid-feedback">
                                            Informe o numero de contato.
                                        </div>

                                    </div>

                                </div>



                                <div class="mb-4    ">

                                    <label for="imagemEvento" class="form-label">
                                        Banner do Evento (opcional)
                                    </label>

                                    <input type="file" class="form-control" id="imagemEvento" name="imagemEvento">
                                </div>


                                <div class="text-center">

                                    <button type="submit" class="btn btn-primary px-5">

                                        <i class="bi bi-check-circle"></i>
                                        Cadastrar Evento

                                    </button>


                                    <button type="reset" class="btn btn-outline-primary px-5 ms-2">

                                        Limpar

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</section>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- Métodos adicionais -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

<!-- jQuery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- Seu JavaScript -->
<script src="assets/js/evento.js"></script>