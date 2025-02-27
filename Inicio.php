
////////////////////////////////////
// Tela pós login//
////////////////////////////////////



<?php
// Inicia a session p acessar os dados do user
session_start();

// se o usuário nao tiver logado
if (!isset($_SESSION['user_id'])) {
    // vai pra pagina de login
    header('Location: login.php');
    exit; // encerra o script
}

// Pega o nome do user
$nome = $_SESSION['user_nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>TelaDeInício</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <!-- Exibe o nome do usuário na tela -->
    <h1>Bem-vindo, <?php echo $nome; ?>!</h1>

    <p>Você está logado.</p>

    <!-- Link para fazer logout e encerrar a sessão -->
    <a href="logout.php">Sair</a>
</body>
</html>
