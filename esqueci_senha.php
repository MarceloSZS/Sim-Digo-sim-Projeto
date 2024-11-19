<?php

//Conexão com o banco de dados
include("PHP/conexao.php");

// Inclui as classes principais do PHPMailer
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        session_start();
        $codigo = rand(100000, 999999); // Código de 6 dígitos
        $_SESSION['codigo_verificacao'] = $codigo;
        $_SESSION['email_verificacao'] = $email;

        // Salvar código temporário no banco de dados (opcional)
        $conn->query("UPDATE usuario SET codigo_verificacao = '$codigo' WHERE email = '$email'");

        // Envio do e-mail com PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.simdigosim.com.br'; // Configurações SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'no-reply@simdigosim.com.br';
            $mail->Password = 'simdigosimdev';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('no-reply@simdigosim.com.br', 'Sim, Digo Sim');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->addCustomHeader('Content-Language', 'pt-BR');
            $mail->Subject = 'Código de Verificação para Redefinição de Senha';
            $mail->Body = "Seu código de verificação é: <b>$codigo</b>";

            $mail->send();
            echo "Código enviado para seu e-mail!";
            
            header("Location: verificar_codigo");
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }

    } else {
        echo "E-mail não encontrado.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
<!-- Formulário simples de Redefinição de senha -->
<form method="POST">
    <label>Digite seu e-mail para redefinir a senha:</label>
    <input type="email" name="email" required>
    <button type="submit">Enviar Código</button>
</form>

</body>
</html>
