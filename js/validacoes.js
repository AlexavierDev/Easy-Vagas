function validarPlaca(placa) {
    // Definir o padrão da placa usando regex
    const pattern = /^[A-Z]{3}[0-9][0-9A-Z][0-9]{2}$/;

    // Verificar se a placa corresponde ao padrão
    if (pattern.test(placa)) {
        return true; // Formato válido
    } else {
        return false; // Formato inválido
    }
}

function validarCampoPlaca() {
    const placaInput = document.getElementById('placa');
    const placa = placaInput.value.trim().toUpperCase(); // Converte para maiúsculas e remove espaços extras
    const btnRegistrar = document.getElementById('btn-registrar');

    // Verificar se a placa é válida
    if (validarPlaca(placa)) {
        // Formato válido
        btnRegistrar.disabled = false
        placaInput.classList.remove('is-invalid');
        placaInput.classList.add('is-valid');

    } else {
        // Formato inválido
        btnRegistrar.disabled = true
        placaInput.classList.add('is-invalid');
    }
}


function validaEmail() {
    const inputEmail = document.getElementById('email');
    const btnCadastrar = document.getElementById('btn-cadastrar');
    const email = inputEmail.value.trim(); // limpaa os espaços vazios

// Expressão Regular para validar o formato do e-mail
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (emailRegex.test(email)) {
        btnCadastrar.disabled = false
        inputEmail.classList.remove('is-invalid');
        inputEmail.classList.add('is-valid');
    } else {
        // E-mail inválido, exibe mensagem de erro
        btnCadastrar.disabled = true
        inputEmail.classList.add('is-invalid');
    }
}

