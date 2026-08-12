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

    

     require_once __DIR__ . "/routes.php";

