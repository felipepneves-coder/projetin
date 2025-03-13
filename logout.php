<?php
// inicia a session para matar dps
session_start();

// Limpa todos os dados da sessão
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroi tudo, deslogando o usuário
session_destroy();

// Redireciona para a page de inicio
header('Location: index.php');
exit;
