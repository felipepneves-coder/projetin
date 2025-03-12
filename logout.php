<?php
// inicia a session para matar dps
session_start();

// Destroi tudo, deslogando o usuário
session_destroy();

// Redireciona para a page de inicio
header('Location: index.php');
exit;
