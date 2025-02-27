
////////////////////////////////////
// Conexão com Banco de dados//
////////////////////////////////////


<?php
$host = 'localhost'; // Servidor do b dados
$db   = 'felps'; // Nome do b dados
$user = 'root'; // Usuário do b dados
$pass = ''; // Senha (wampserver é vazia por padrao)
$charset = 'utf8mb4'; // Charset para suportar os caracteres 

// string de conexão para facilitar
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Configurações do PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Ativa exceções para erros
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retorna resultados como array associativo
    PDO::ATTR_EMULATE_PREPARES   => false, // Desativa a emulação de prepared statements
];

// Tentando conectar ao banco de dados
try {
    $pdo = new PDO($dsn, $user, $pass, $options); // Cria a conexão com o banco
} catch (\PDOException $e) {
    // Em caso de erro, lança uma exceção com a mensagem e o código do erro
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
