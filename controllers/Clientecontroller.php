<?php

// =========================================================
// CONFIGURAÇÃO DA RESPOSTA
// =========================================================

header("Content-Type: application/json; charset=utf-8");


// =========================================================
// CARREGAR VALIDATOR
// =========================================================

require __DIR__ . "/../libs/php/Validator.php";


// =========================================================
// VERIFICAR MÉTODO DA REQUISIÇÃO
// =========================================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido. Utilize uma requisição POST.",
        "dados" => null,
        "erros" => null
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// =========================================================
// CRIAR VALIDATOR
// =========================================================

$validator = new Validator($_POST);


// =========================================================
// EXECUTAR VALIDAÇÕES
// =========================================================

validarCadastro($validator);


// =========================================================
// VERIFICAR ERROS
// =========================================================

if ($validator->fails()) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Corrija os campos indicados.",
        "dados" => null,
        "erros" => $validator->errors()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// =========================================================
// TODO:
// AQUI SERÁ REALIZADO O CADASTRO NO BANCO DE DADOS
// =========================================================


// =========================================================
// RETORNO DE SUCESSO
// =========================================================

http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Cliente cadastrado com sucesso.",
    "dados" => $validator->data(),
    "erros" => null
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit;


// =========================================================
// FUNÇÃO DE VALIDAÇÃO
// =========================================================

function validarCadastro($validator)
{

    // =====================================================
    // NOME
    // =====================================================

    $validator->required(
        "nome",
        "O nome do cliente é obrigatório."
    );

    $validator->string(
        "nome",
        "O nome do cliente deve ser um texto válido."
    );

    $validator->minLength(
        "nome",
        3,
        "O nome do cliente deve conter no mínimo 3 caracteres."
    );

    $validator->maxLength(
        "nome",
        100,
        "O nome do cliente deve conter no máximo 100 caracteres."
    );


    // =====================================================
    // CPF
    // =====================================================

    $validator->required(
        "cpf",
        "O CPF do cliente é obrigatório."
    );

    $validator->string(
        "cpf",
        "O CPF deve ser um texto válido."
    );

    $validator->minLength(
        "cpf",
        11,
        "O CPF deve conter 11 dígitos."
    );

    $validator->maxLength(
        "cpf",
        14,
        "O CPF deve conter no máximo 14 caracteres."
    );


    // =====================================================
    // E-MAIL
    // =====================================================

    $validator->required(
        "email",
        "O e-mail do cliente é obrigatório."
    );

    $validator->email(
        "email",
        "Informe um e-mail válido."
    );


    // =====================================================
    // TELEFONE
    // =====================================================

    $validator->required(
        "telefone",
        "O telefone do cliente é obrigatório."
    );

    $validator->string(
        "telefone",
        "O telefone deve ser um texto válido."
    );

    $validator->minLength(
        "telefone",
        10,
        "O telefone deve conter no mínimo 10 caracteres."
    );

    $validator->maxLength(
        "telefone",
        15,
        "O telefone deve conter no máximo 15 caracteres."
    );

}