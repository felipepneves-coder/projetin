////////////////////////////////////
// Tela de login//
////////////////////////////////////

<?php
// Inicia a session p acessar os dados do user
session_start();

// conecta com o banco
require 'conexao.php';

// Se o formulario foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pega o email e a senha
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // consulta SQL p buscar o usuário pelo email
    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(); // Obtém os dados do usuário

    // Ve se o user existe e se a senha ta correta
    if ($user && password_verify($senha, $user['senha'])) {
        // Armazena informações do usuário na sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];

        // Redireciona o usuário para o painel de controle
        header('Location: inicio.php');
        exit;
    } else {
        // Mensagem de erro se o login falhar
        echo "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="formlogin">
    <h1>Login</h1>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>
