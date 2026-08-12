<?php
//definir url do  projeto


//definir páginas válidas no projeto
$paginasValidas = [
    "landing" => __DIR__ . "/views/landing.php",
    "home"    => __DIR__ . "/views/home.php",
    "eventos"  => __DIR__ . "/views/eventos.php",
    "noticias" => __DIR__ . "/views/noticias.php",
    "login"   => __DIR__ . "/views/login.php",
];

// Capturar a página informada na url 
$page = $_GET["page"] ?? "landing";

//Verificar se a página existe
if (array_key_exists($page, $paginasValidas)) {
    require $paginasValidas[$page];
} else {
    http_response_code(404);
    require __DIR__ . "/views/404.php";
}
