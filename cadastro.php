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
    <link rel="stylesheet" href="assets/css/main.css"> <!-- Importa o CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Formulário de cadastro -->

    <body>

        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
                <h1 class="text-center">Cadastro</h1>

                <form method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
                </form>

                <p class="mt-3 text-center">Já tem uma conta? <a href="login.php">Faça login</a></p>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>