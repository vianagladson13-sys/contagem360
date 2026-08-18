<?php

// =========================================================
// ROTAS DO PROJETO CONTAGEM360
// =========================================================

// Definir páginas válidas
$paginasValidas = [

    // Página inicial pública
    "landing" => __DIR__ . "/views/landing.php",

    // Página principal após login
    "home" => __DIR__ . "/views/home.php",

    // Login
    "login" => __DIR__ . "/views/login.php",

    // Eventos
    "eventos" => __DIR__ . "/views/evento.php",

    // Cliente
    "cliente" => __DIR__ . "/views/cliente.php",

];


// =========================================================
// CAPTURAR A PÁGINA DA URL
// =========================================================

$page = $_GET["page"] ?? "landing";


// =========================================================
// VERIFICAR SE A ROTA EXISTE
// =========================================================

if (array_key_exists($page, $paginasValidas)) {

    require $paginasValidas[$page];

} else {

    // Página não encontrada
    http_response_code(404);

    require __DIR__ . "/views/404.php";

}