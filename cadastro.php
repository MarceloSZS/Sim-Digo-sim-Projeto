<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar conta</title>
    <link rel="stylesheet" href="CSS/Cadastro.css">
    <link rel="shortcut icon" href="Favicon/Anel pintado.png" type="image/x-icon">
    <style>
        @font-face {
            font-family: poppins;
            src: url('Fonts/poppins-light-webfont.woff2') format('woff2');
            font-weight: 300; 
            font-style: normal;
        }
    
        @font-face {
            font-family: poppins;
            src: url('Fonts/poppins-regular-webfont.woff2') format('woff2');
            font-weight: 400; 
            font-style: normal;
        }
    
    
        </style> 
    
</head>
<body>
    <div class="fundo">
        <img src="Imagem/Background-Banner-Desktop.webp" alt="Imagem de fundo">
      </div>
    
    <div class="container">
        <h2>Criar conta</h2>
        <form id="forms" method="POST" action="./PHP/processa_cadastro.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" >
            </div>
            <div class="form-group">
                <label for="nome materno">Nome Materno:</label>
                <input type="text" id="nome materno" name="nome materno" >
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" oninput="handleCPFInput(event)" placeholder="000.000.000-00" required>
                <p id="cpf-validation-message"></p>
            </div>
            <div class="form-group">
                <label for="email">E-mail(Login):</label>
                <input type="email" id="email" name="email" >
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" >
            </div>
            <div class="form-group">
                <label for="senha-confirmacao">Confirme sua senha:</label>
                <input type="password" id="senha-confirmacao" name="senha-confirmacao" >
            </div>

            <div class="form-group">
                <label for="endereco">Endereço:</label><br>
                <input type="text" id="endereco" name="endereco" required><br>
            </div>

            <div class="form-group">
                <label for="numero">Número:</label><br>
                <input type="text" id="numero" name="numero" required><br>
            </div>

            <div class="form-group">
                <label for="complemento">Complemento (opcional):</label><br>
                <input type="text" id="complemento" name="complemento"><br>
            </div>

            <div class="form-group">
                <label for="bairro">Bairro:</label><br>
                <input type="text" id="bairro" name="bairro" required><br>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label><br>
                <input type="text" id="cidade" name="cidade" required><br>
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label><br>
                <input type="text" id="estado" name="estado" required><br>
            </div>

            <div class="form-group">
                <label for="cep">CEP:</label><br>
                <input type="text" id="cep" name="cep" required><br>
            </div>
            <div class="form-group">
                <label for="data">Data de Nascimento:</label>
                <input type="date" id="data" name="data">
            </div>
            <div class="form-group">
                <label for="telefoneCelular">Telefone Celular:</label>
                <input type="tel" id="telefoneCelular" name="telefoneCelular" placeholder="+55(xx)xxxxx-xxxx"  maxlength="13">
                <div id="error-telefoneCelular" style="color: red;"></div>
            </div>
            <div class="form-group-full">
                <label>Sexo:</label>
                <div class="radio-group">
                    <select name="" id="">
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>
            </div>
            <div class="form-group-full checkbox-container">
                <input type="checkbox" id="termos" name="termos" >
                <label for="termos">Aceito as condições de uso e de <a href="#">Privacidade</a>.</label>
            </div>
            <button type="submit">Criar conta</button>
            <button type="button" onclick="limparFormulario()">Limpar Campos</button>        
        </form>
        <div class="login-link">
            Já tem uma conta? <a href="login">Entrar</a>
        </div>
        <br>
        <div id="mensagemErro" style="color:red; display:none;"></div>
    </div>
</body>
<script src="./JS/script cadastro.js"></script>
</html>
