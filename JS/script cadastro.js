document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('forms');
    const mensagemErro = document.getElementById('mensagemErro');
    const telefoneCelularInput = document.getElementById('telefoneCelular');
    

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        mensagemErro.innerHTML = '';
        mensagemErro.style.display = 'none';

        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const senha = document.getElementById('senha').value.trim();
        const telefone = telefoneCelularInput.value.trim();
        const dataCasamento = document.getElementById('data').value.trim();
        const termos = document.getElementById('termos').checked;

        if (nome.length === 0) {
            showError('Nome e sobrenomes são obrigatórios.');
        } else if (email.length === 0) {
            showError('E-mail é obrigatório.');
        } else if (senha.length === 0) {
            showError('Senha é obrigatória.');
        } else if (telefone.length === 0) {
            showError('Telefone é obrigatório.');
        } else if (dataCasamento.length === 0) {
            showError('A data do casamento é obrigatória.');
        } else if (!termos) {
            showError('Você deve aceitar os termos de uso e de privacidade.');
        } else {
            form.submit();
        }
    });

    telefoneCelularInput.addEventListener('input', (e) => {
        const formattedValue = formatarTelefoneCelular(e.target.value);
        e.target.value = formattedValue;
    });


    function showError(message) {
        mensagemErro.innerHTML = message;
        mensagemErro.style.display = 'block';
    }
});

function formatarTelefoneCelular(valor) {
    return valor.replace(/(\d{2})(\d{5})(\d{4})/, "+55($1)$2-$3");
}

function formatCPF(cpf) {
    cpf = cpf.replace(/\D/g, ""); // Remove tudo o que não for número
    if (cpf.length <= 3) return cpf;
    if (cpf.length <= 6) return cpf.replace(/(\d{3})(\d{1,})/, "$1.$2");
    if (cpf.length <= 9) return cpf.replace(/(\d{3})(\d{3})(\d{1,})/, "$1.$2.$3");
    return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{1,})/, "$1.$2.$3-$4");
}

function validateCPF(cpf) {
    
    cpf = cpf.replace(/\D/g, "");

    
    if (cpf.length !== 11) return false;

    
    if (/^(\d)\1{10}$/.test(cpf)) return false;

    
    let soma = 0;
    let resto;

    
    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.charAt(i - 1)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.charAt(9))) return false;

    
    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.charAt(i - 1)) * (12 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.charAt(10))) return false;

    return true;
}


function handleCPFInput(event) {
    let cpf = event.target.value;
    cpf = formatCPF(cpf);
    event.target.value = cpf;

    
    const cpfInput = document.getElementById('cpf');
    const message = document.getElementById('cpf-validation-message');

    if (validateCPF(cpf.replace(/\D/g, ""))) {
        message.textContent = "CPF válido!";
        message.style.color = "green";
    } else {
        message.textContent = "CPF inválido!";
        message.style.color = "red";
    }
}

       
       function verificarSenhas() {
        
        const senha1 = document.getElementById('senha').value;
        const senha2 = document.getElementById('senha-confirmacao').value;
        const mensagem = document.getElementById('mensagem-senha');

        
        if (senha1 === senha2 && senha1 !== "") {
            mensagem.textContent = "As senhas são iguais!";
            mensagem.style.color = "green";
        } else {
            mensagem.textContent = "As senhas não coincidem!";
            mensagem.style.color = "red";
        }
    }

    function limparFormulario() {
        const formulario = document.getElementById('forms');
        formulario.reset();
    }

    function formatarCEP(cep) {
        cep = cep.replace(/\D/g, ""); // Remove tudo o que não for número
        if (cep.length <= 5) return cep;
        return cep.replace(/(\d{5})(\d{1,})/, "$1-$2"); // Adiciona o hífen após os 5 primeiros números
    }

    // Função para manipular o evento de input
    function handleCEPInput(event) {
        const cep = document.getElementById('cep');
        let cep = event.target.value;
        cep = formatarCEP(cep);
        event.target.value = cep;
    }