// =========================================================
// PROJETO CONTAGEM360
// CADASTRO DE CLIENTE
// JQUERY + JQUERY VALIDATION + JQUERY MASK
// =========================================================

$(document).ready(function () {

    // Aplica as máscaras
    aplicarMascaras();

    // Configura validação e envio
    validarFormulario();

});


// =========================================================
// MÁSCARAS
// =========================================================

function aplicarMascaras() {

    // Máscara de CPF
    $("#cpf").mask("000.000.000-00");

    // Máscara de telefone
    $("#telefone").mask("(00) 00000-0000");

}


// =========================================================
// VALIDAÇÃO DO FORMULÁRIO
// =========================================================

function validarFormulario() {

    // Div onde serão exibidas as mensagens
    const mensagem = document.getElementById("mensagem");


    // =====================================================
    // JQUERY VALIDATION
    // =====================================================

    $("#formCliente").validate({

        // -------------------------------------------------
        // REGRAS
        // -------------------------------------------------

        rules: {

            nome: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            cpf: {
                required: true,
                minlength: 14,
                maxlength: 14
            },

            email: {
                required: true,
                email: true
            },

            telefone: {
                required: true,
                minlength: 15,
                maxlength: 15
            }

        },


        // -------------------------------------------------
        // MENSAGENS
        // -------------------------------------------------

        messages: {

            nome: {
                required: "Informe o nome do cliente.",
                minlength: "O nome deve ter pelo menos 3 caracteres.",
                maxlength: "O nome deve ter no máximo 100 caracteres."
            },

            cpf: {
                required: "Informe o CPF.",
                minlength: "Informe um CPF válido.",
                maxlength: "Informe um CPF válido."
            },

            email: {
                required: "Informe o e-mail.",
                email: "Informe um e-mail válido."
            },

            telefone: {
                required: "Informe o telefone.",
                minlength: "Informe um telefone válido.",
                maxlength: "Informe um telefone válido."
            }

        },


        // -------------------------------------------------
        // POSICIONAMENTO DAS MENSAGENS
        // -------------------------------------------------

        errorPlacement: function (error, element) {

            const grupo = element.closest(".mb-3");

            grupo.find(".invalid-feedback").text(error.text());

        },


        // -------------------------------------------------
        // CAMPO INVÁLIDO
        // -------------------------------------------------

        highlight: function (element) {

            $(element)
                .removeClass("is-valid")
                .addClass("is-invalid");

        },


        // -------------------------------------------------
        // CAMPO VÁLIDO
        // -------------------------------------------------

        unhighlight: function (element) {

            $(element)
                .removeClass("is-invalid")
                .addClass("is-valid");

        },


        // =================================================
        // ENVIO DO FORMULÁRIO
        // =================================================

        submitHandler: async function (formulario) {

            // Captura os dados do formulário
            const dados = new FormData(formulario);


            // Mostra os dados no console
            console.table(
                Object.fromEntries(dados.entries())
            );


            // -------------------------------------------------
            // MENSAGEM DE ENVIO
            // -------------------------------------------------

            mensagem.className = "alert alert-info mt-3";

            mensagem.textContent =
                "Enviando dados do cliente...";


            try {

                // -------------------------------------------------
                // ENVIA PARA O CONTROLLER
                // -------------------------------------------------

                const resposta = await fetch(
                    "controllers/ClienteController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                // -------------------------------------------------
                // CONVERTE RESPOSTA PARA JSON
                // -------------------------------------------------

                const resultado = await resposta.json();

                console.log(resultado);


                // -------------------------------------------------
                // VERIFICA ERRO HTTP
                // -------------------------------------------------

                if (!resposta.ok) {

                    mensagem.className =
                        "alert alert-danger mt-3";


                    let conteudo =
                        `<strong>${resultado.mensagem}</strong>`;


                    // Verifica se existem erros
                    if (resultado.erros) {

                        conteudo +=
                            "<ul class='mb-0 mt-2'>";


                        Object.entries(
                            resultado.erros
                        ).forEach(
                            function ([campo, erros]) {

                                erros.forEach(
                                    function (erro) {

                                        conteudo +=
                                            `<li>${erro}</li>`;

                                    }
                                );

                            }
                        );


                        conteudo += "</ul>";

                    }


                    mensagem.innerHTML = conteudo;

                    return;

                }


                // -------------------------------------------------
                // SUCESSO
                // -------------------------------------------------

                mensagem.className =
                    "alert alert-success mt-3";


                mensagem.textContent =
                    resultado.mensagem;


                // Limpa o formulário
                formulario.reset();


                // Remove as classes de validação
                $(formulario)
                    .find(".form-control")
                    .removeClass(
                        "is-valid is-invalid"
                    );


            } catch (erro) {

                // -------------------------------------------------
                // ERRO DE COMUNICAÇÃO
                // -------------------------------------------------

                mensagem.className =
                    "alert alert-danger mt-3";


                mensagem.textContent =
                    "Erro ao enviar os dados para o controller de cliente.";


                console.error(
                    "Erro:",
                    erro
                );

            }

        }

    });


    // =====================================================
    // RESET DO FORMULÁRIO
    // =====================================================

    $("#formCliente").on("reset", function () {

        $(this)
            .find(".form-control")
            .removeClass(
                "is-valid is-invalid"
            );


        mensagem.className =
            "alert d-none";


        mensagem.textContent = "";

    });

}