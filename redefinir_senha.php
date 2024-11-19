<?php
//Conexão com o banco de dados
include("PHP/conexao.php");

session_start();

if (!isset($_SESSION['verificado'])) {
    header("Location: login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
    $email = $_SESSION['email_verificacao'];

    $conn->query("UPDATE usuario SET senha = '$nova_senha' WHERE email = '$email'");
    
    // Limpar dados temporários
    unset($_SESSION['codigo_verificacao']);
    unset($_SESSION['email_verificacao']);
    unset($_SESSION['verificado']);

    echo "Senha redefinida com sucesso!";
    header("Location: login");
    exit;
}

$conn->close();
?>

<form method="POST">
    <label>Digite a nova senha:</label>
    <input type="password" name="nova_senha" required>
    <button type="submit">Redefinir Senha</button>
</form>
