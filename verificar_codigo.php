<?php
session_start();


// Verificar se o e-mail está armazenado na sessão
if (!isset($_SESSION['email_verificacao'])) {
    header("Location: esqueci_senha");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_digitado = $_POST['codigo'];
    
    if ($codigo_digitado == $_SESSION['codigo_verificacao']) {
        $_SESSION['verificado'] = true;
        header("Location: redefinir_senha");
        exit;
    } else {
        echo "Código incorreto. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
</head>
<body>
    
<!-- Formulário simples de Redefinição de senha -->
<form method="POST">
    <label>Digite o código de verificação enviado ao seu e-mail:</label>
    <input type="text" name="codigo" required>
    <button type="submit">Verificar Código</button>
</form>

</body>
</html>