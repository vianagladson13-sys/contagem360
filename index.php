<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contagem360</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <?php
    // Captura a página atual informada na URL
    $page = $_GET["page"] ?? "landing";

    // Páginas que possuem HTML próprio
    $paginasPublicas = [
        "landing" => __DIR__ . "/views/landing.php",
        "login" => __DIR__ . "/views/login.php",
    ];

    // Verifica se é uma página independente
    if (array_key_exists($page, $paginasPublicas)) {
        require $paginasPublicas[$page];
        exit;
    }

    ?>

    <!-- Cabeçalho -->
    <header class="bg-dark text-white py-3">
        <div class="container">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">

                <h1 class="h3 mb-3 mb-md-0">
                    <a href="index.php?page=home" class="text-white text-decoration-none">
                        Contagem360
                    </a>
                </h1>

                <!-- Menu principal -->
                <nav class="nav">

                    <a href="index.php?page=landing"
                        class="nav-link <?= $page === 'landing' ? 'text-white fw-bold' : 'text-white-50' ?>">
                        Inicio
                    </a>

                    <a href="index.php?page=eventos"
                        class="nav-link <?= $page === 'eventos' ? 'text-white fw-bold' : 'text-white-50' ?>">
                        Eventos
                    </a>

                    <a href="index.php?page=landing"
                        class="nav-link <?= $page === 'landing' ? 'text-white fw-bold' : 'text-white-50' ?>">
                        Sair
                    </a>

                </nav>

            </div>

        </div>
    </header>

    <!-- Conteúdo carregado pelas rotas -->
    <main class="flex-grow-1">

        <?php
        // Carrega o arquivo que controla as páginas do sistema
        require __DIR__ . "/routes.php";
        ?>

    </main>

    <!-- Rodapé -->
    <footer class="bg-dark text-white text-center py-3 mt-5">

        <p class="mb-0">
            Contagem360
        </p>

    </footer>

    <!-- JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Constantes do sistema -->
    <script src="config/constants.js"></script>

    <!-- Funções auxiliares -->
    <script src="js/helpers.js"></script>

</body>

</html>