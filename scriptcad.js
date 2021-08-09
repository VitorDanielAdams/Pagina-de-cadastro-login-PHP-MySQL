const form = document.getElementById('form');
const userName = document.getElementById('user');
const inputPassword = document.getElementById('password');
const inputEmail = document.getElementById('email');
const inputConfirmPassword = document.getElementById('confirmPassword');

function checkInputs() {
    const userNameValue = userName.value.trim();
    const passwordValue = inputPassword.value.trim();
    const emailValue = inputEmail.value.trim();
    const confirmPasswordValue = inputConfirmPassword.value.trim();

    if (userNameValue === '') {
        setErrorFor(userName, "O campo Usuário não pode estar vazio");
    } else {
        setSuccessFor(userName);
    }

    if (passwordValue === '') {
        setErrorFor(inputPassword, "O campo Senha não pode estar vazio");
    } else if (passwordValue.length < 8) {
        setErrorFor(inputPassword, "A senha deve ter no mínimo 8 digitos");
    } else {
        setSuccessFor(inputPassword);
    }

    if (emailValue === '') {
        setErrorFor(inputEmail, "O campo Email não pode estar vazio");
    } else if (!isEmail(emailValue)) {
        setErrorFor(inputEmail, "Insira um email válido");
    } else {
        setSuccessFor(inputEmail);
    }

    if (confirmPasswordValue === '') {
        setErrorFor(inputConfirmPassword, "Insira um valor nesse campo");
    } else if (passwordValue != confirmPasswordValue) {
        setErrorFor(inputConfirmPassword, "As senhas não correspondem");
        setErrorFor(inputPassword, " ");
    } else {
        setSuccessFor(inputConfirmPassword);
    }

    if (userNameValue !== '' && passwordValue !== '' && emailValue !== '' && confirmPasswordValue !== '' && isEmail(emailValue) && passwordValue === confirmPasswordValue) {
        return true;
    }
}

function setErrorFor(input, menssage) {
    const inputControl = input.parentElement;
    const span = inputControl.querySelector('small');

    span.innerText = menssage;
    inputControl.className = 'input error';
}

function setSuccessFor(input) {
    const inputControl = input.parentElement;

    inputControl.className = 'input';
}

function isEmail(inputEmail) {
    return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(inputEmail);
}