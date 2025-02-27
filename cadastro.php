
////////////////////////////////////
// Tela de cadastro//
////////////////////////////////////


<?php

require 'conexao.php';

// Ve se o form foi enviado por post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pega os dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // criptografa a senha (importante)
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    // Prepara a consulta SQL para evitar SQL Injection (importante)
    $stmt = $pdo->prepare('INSERT INTO usuarios(nome, email, senha) VALUES (?, ?, ?)');
    
    // Executa a inserção com os dados do usuário
    $stmt->execute([$nome, $email, $senha]);

    // pagina de login
    header('Location: login.php');
    exit; // Finaliza o script 
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css"> <!-- Importa o CSS -->
</head>
<body>
    <h1>Cadastro</h1>

    <!-- Formulário de cadastro -->
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
</body>
</html>
