<?php

// conexão com o Banco de dados
include("conexao.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe e limpa os dados do formulário
    $nome = $conn->real_escape_string(trim($_POST['nome']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $senha = $conn->real_escape_string(trim($_POST['senha']));
    $estado = $conn->real_escape_string(trim($_POST['estado']));
    $data_casamento = $conn->real_escape_string(trim($_POST['data']));
    $telefonecelular = $conn->real_escape_string(trim($_POST['telefoneCelular']));
    $genero = $conn->real_escape_string(trim($_POST['genero']));
    $termos = isset($_POST['termos']) ? 1 : 0;

    // Validação inicial
    if (empty($nome) || empty($email) || empty($senha) || empty($estado) || empty($data_casamento) || empty($telefonecelular)) {
        echo "Todos os campos são obrigatórios!";
        exit();
    }

    // Hash da senha
    $senha_hashed = password_hash($senha, PASSWORD_BCRYPT);

    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuario (nome, email, senha, estado, data_casamento, telefonecelular, genero, aceitou_termos) VALUES ('$nome', '$email', '$senha_hashed', '$estado', '$data_casamento', '$telefonecelular', '$genero', '$termos')";

    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de login
        header("Location: ../login");
        exit();
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
}

$conn->close();
?>
