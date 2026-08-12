const FormLogin = document.getElementById('FormLogin');

FormLogin.addEventListener('submit', function (event) {

    event.preventDefault();

    const email = document.getElementById("email");
    const senha = document.getElementById("senha");
    const erroEmail = document.getElementById("erroEmail");

    console.log(email);
    console.log(senha);

    if (email.value.trim() == "") {

        email.classList.add("is-invalid");
        email.classList.remove("is-valid");

    } else if (!email.checkValidity()) {

        email.classList.add("is-invalid");
        email.classList.remove("is-valid");

    } else {

        email.classList.add("is-valid");
        email.classList.remove("is-invalid");

    }
    if (senha.value.trim() == "") {

        senha.classList.add("is-invalid")
        senha.classList.remove("is-valid")
    } else {

        senha.classList.add("is-valid");
        senha.classList.remove("is-invalid")
    }


    if (email.value.trim() == "a@a.com" && senha.value.trim() == "123456") {
        window.location.href = "eventos.html";
      
    }
})