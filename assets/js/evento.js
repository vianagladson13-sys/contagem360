// PROJETO USANDO JQUERY

$(document).ready(function () {
    // Aplica as máscaras nos campos
   // aplicarMascaras();
  
    // Configura a validação e o envio
    validarFormulario();
  });
  

  function aplicarMascaras() {
    //Telefone no formato: (31) 99999-9999
    $("#contato").mask("(00) 00000-0000");
    
    };
  
    // Permite até 6 números
    $("#quantidade").mask("000000") ;
  
  
  function validarFormulario() {
  
    // Seleciona a div responsável pelas mensagens
    const mensagem = document.getElementById("mensagem");
  
    // Impede o formulário de recarregar a página
    $("#formEvento").on("submit", function (evento) {
      evento.preventDefault();
    });
  
    // Configura o jQuery Validation
    $("#formEvento").validate({
      // Regras de validação
      rules: {
        nomeEvento: {
            required: true,
            minlength: 3,
            maxlength: 100
        },

        categoria: {
            required: true
        },

        dataEvento: {
            required: true
        },

        horaEvento: {
            required: true
        },

        localEvento: {
            required: true,
            minlength: 3,
            maxlength: 150
        },

        descricaoEvento: {
            required: true,
            minlength: 10,
            maxlength: 1000
        },

        organizador: {
            required: true,
            minlength: 3,
            maxlength: 100
        },

        contato: {
            required: true,
            minlength: 15
        },

        imagemEvento: {
            extension: "jpg|jpeg|png|webp"
        }
      },
  
      // Mensagens em português
      messages: {
        nomeEvento: {
            required: "Informe o nome do evento.",
            minlength: "Digite pelo menos 3 caracteres.",
            maxlength: "O nome deve ter no máximo 100 caracteres."
        },

        categoria: {
            required: "Selecione uma categoria."
        },

        dataEvento: {
            required: "Informe a data do evento."
        },

        horaEvento: {
            required: "Informe o horário do evento."
        },

        localEvento: {
            required: "Informe o local do evento.",
            minlength: "Informe um local válido.",
            maxlength: "O local deve ter no máximo 150 caracteres."
        },

        descricaoEvento: {
            required: "Informe uma descrição.",
            minlength: "A descrição deve ter pelo menos 10 caracteres.",
            maxlength: "A descrição deve ter no máximo 1000 caracteres."
        },

        organizador: {
            required: "Informe o nome do organizador.",
            minlength: "Digite pelo menos 3 caracteres.",
            maxlength: "O nome deve ter no máximo 100 caracteres."
        },

        contato: {
            required: "Informe o número de contato.",
            minlength: "Informe um telefone completo."
        },

        imagemEvento: {
            extension: "Envie uma imagem JPG, JPEG, PNG ou WEBP."
        }
      },
  
      // Mensagens de erro
      errorPlacement: function (error, element) {
        element.closest(".mb-3").find(".invalid-feedback").text(error.text());
      },
  
      // Executado quando o campo está inválido
      highlight: function (element) {
        $(element).removeClass("is-valid").addClass("is-invalid");
      },
  
      // Executado quando o campo está válido
      unhighlight: function (element) {
        $(element).removeClass("is-invalid").addClass("is-valid");
      },
  
      // Executado somente quando todos os campos forem válidos
      submitHandler: async function (formulario) {
        // Captura os dados do formulário
        const dados = new FormData(formulario);
  
        /*
         * Converte o preço:
         * Formato exibido: 1.234,56
         * Formato enviado: 1234.56
         */
        // const precoConvertido = $("#preco")
        //   .val()
        //   .replace(/\./g, "")
        //   .replace(",", ".");
  
        // // Substitui o preço mascarado pelo preço convertido
        // dados.set("preco", precoConvertido);
  
        //Mostra os dados no console
        console.table(Object.fromEntries(dados.entries()));
  
        // Exibe mensagem enquanto envia
        mensagem.className = "alert alert-info mt-3";
        mensagem.textContent = "Enviando dados...";
  
        try {
          // Envia os dados para o Controller
          const resposta = await fetch("controllers/EventoController.php", {
            method: "POST",
            body: dados,
          });
  
          // Converte a resposta JSON
          const resultado = await resposta.json();
  
          //console.log(resultado);
  
          // Verifica se ocorreu erro HTTP
          if (!resposta.ok) {
            mensagem.className = "alert alert-danger mt-3";
            let conteudo = `<strong>${resultado.mensagem}</strong>`;
            if (resultado.erros) {
              conteudo += "<ul class='mb-0 mt-2'>";
              Object.entries(resultado.erros).forEach(function ([campo, erros]) {
                erros.forEach(function (erro) {
                  conteudo += `<li>${erro}</li>`;
                });
              });
              conteudo += "</ul>";
            }
  
            mensagem.innerHTML = conteudo;
  
            return;
          }
  
          // Exibe mensagem de sucesso
          mensagem.className = "alert alert-success mt-3";
          mensagem.textContent = resultado.mensagem;
  
          // Limpa os campos
          formulario.reset();
  
        } catch (erro) {
          mensagem.className = "alert alert-danger mt-3";
          mensagem.textContent =
            "Erro ao enviar os dados para o controller de evento."; //Uso da constante: MSG_ERRO
  
          console.error(erro);
        }
      },
    });
  
    // Quando o formulário for limpo
    $("#formEvento").on("reset", function () {
      // Remove as classes de validação
      $(this).find(".form-control").removeClass("is-valid is-invalid");
    });
  }
  