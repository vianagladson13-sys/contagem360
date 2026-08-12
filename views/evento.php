<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contagem 360</title>

    <link rel="icon" href="img/logo.png" type="image/png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

    <!-- ==========================
            NAVBAR
    =========================== -->

    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

            <div class="container">

                <!-- Logo -->

                <a class="navbar-brand fw-bold d-flex align-items-center" href="#">

                    <img src="img/logo.png" alt="Logo Contagem 360" width="150" class="me-2">
                    <div>

                        <h4 class="m-0">Contagem <span id="xbox">360</span></h4>

                        <small class="text-muted">
                            Turismo • Cultura • Eventos
                        </small>

                    </div>

                </a>

                <!-- Botão Mobile -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <!-- Menu -->

                <div class="collapse navbar-collapse" id="menu">

                    <ul class="navbar-nav mx-auto">

                        <li class="nav-item">
                            <a class="nav-link " href="index.html">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Eventos
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Notícias
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                O que fazer?
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Projetos Regionais
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Serviços
                            </a>
                        </li>

                    </ul>

                    <!-- Lado direito -->

                    <div class="d-flex align-items-center">

                        <button class="btn btn-link text-dark me-3">

                            <i class="bi bi-search fs-5"></i>

                        </button>

                        <a href="index.html" class="btn btn-primary rounded-pill px-4">

                            Entrar

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>

    <!-- ==========================
            MAIN
    =========================== -->
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
                                        </label>

                                        <input type="text" class="form-control" id="nomeEvento"
                                            placeholder="Digite o nome do evento">

                                        <div class="invalid-feedback">
                                            Informe o nome do evento.
                                        </div>

                                    </div>

                                    <div class="col-md-4 mb-3">

                                        <label for="categoria" class="form-label">
                                            Categoria
                                        </label>

                                        <select class="form-select" id="categoria">

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

                                        <input type="date" class="form-control" id="dataEvento">

                                        <div class="invalid-feedback">
                                            Informe a data.
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label for="horaEvento" class="form-label">
                                            Horário
                                        </label>

                                        <input type="time" class="form-control" id="horaEvento">

                                        <div class="invalid-feedback">
                                            Informe o horário.
                                        </div>

                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label for="localEvento" class="form-label">
                                        Local
                                    </label>

                                    <input type="text" class="form-control" id="localEvento"
                                        placeholder="Ex.: Praça da Glória">

                                    <div class="invalid-feedback">
                                        Informe o local.
                                    </div>

                                </div>

                                <div class="mb-3">

                                    <label for="descricaoEvento" class="form-label">
                                        Descrição
                                    </label>

                                    <textarea class="form-control" rows="5" id="descricaoEvento"
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

                                        <input type="text" class="form-control" id="organizador">
                                        <div class="invalid-feedback">
                                            Informe o nome do Organizador.
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-3">

                                        <label for="contato" class="form-label">
                                            Contato
                                        </label>

                                        <input type="tel" class="form-control" id="contato"
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

                                    <input type="file" class="form-control" id="imagemEvento">
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
    <!-- Modal de Alerta -->
<div class="modal fade" id="modalAlerta" tabindex="-1" aria-labelledby="modalAlertaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="modalAlertaLabel">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Sucesso
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle-fill text-success" style="font-size:70px;"></i>

                <h4 class="mt-3">Evento cadastrado!</h4>

                <p class="text-muted mb-0">
                    O evento foi cadastrado com sucesso.
                </p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                    OK
                </button>
            </div>

        </div>
    </div>
</div>









    <footer class="footer bg-dark text-light pt-5 pb-3">

        <div class="container">

            <div class="row gy-4">

                <!-- Logo -->

                <div class="col-lg-3">

                    <h3 class="fw-bold">

                        Contagem 360

                    </h3>

                    <p>

                        O portal oficial para quem deseja descobrir,
                        viver e aproveitar tudo o que Contagem tem
                        para oferecer.

                    </p>

                    <div class="d-flex gap-3 fs-4">

                        <a href="#" class="text-light">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <a href="#" class="text-light">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="#" class="text-light">
                            <i class="bi bi-youtube"></i>
                        </a>

                    </div>

                </div>

                <!-- Links -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Navegação

                    </h5>

                    <ul class="list-unstyled">

                        <li><a href="#" class="text-light text-decoration-none">Home</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Eventos</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Notícias</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Turismo</a></li>

                    </ul>

                </div>

                <!-- Serviços -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Serviços

                    </h5>

                    <ul class="list-unstyled">

                        <li><a href="#" class="text-light text-decoration-none">Comércio</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Projetos</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Mapa</a></li>

                        <li><a href="#" class="text-light text-decoration-none">Contato</a></li>

                    </ul>

                </div>

                <!-- Contato -->

                <div class="col-lg-2">

                    <h5 class="mb-3">

                        Contato

                    </h5>

                    <p class="mb-1">

                        (31) 99999-9999

                    </p>

                    <p class="mb-1">

                        contato@contagem360.com

                    </p>

                    <p>

                        Contagem - MG

                    </p>

                </div>

                <!-- Newsletter -->

                <div class="col-lg-3">

                    <h5 class="mb-3">

                        Newsletter

                    </h5>

                    <p>

                        Receba novidades e eventos.

                    </p>

                    <form>

                        <div class="input-group">

                            <input type="email" class="form-control" placeholder="Seu e-mail">

                            <button class="btn btn-primary" type="submit">

                                Enviar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col text-center">

                    <small>

                        © 2026 Contagem 360.
                        Todos os direitos reservados.

                    </small>

                </div>

            </div>

        </div>

    </footer>

    <!-- Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
<script src="scriptEv.js"></script>

</html>