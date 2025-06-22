<?php
// Arquivo responsável pela conexão com o banco de dados
// Utiliza PDO (PHP Data Objects) para uma conexão segura e orientada a objetos

// Inclui o arquivo de configuração
require_once 'config.php';

try {
    // Cria uma nova conexão PDO com MySQL
    $conn = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, 
        DB_USER, 
        DB_PASS
    );
    
    // Configura o PDO para lançar exceções em caso de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Em caso de erro na conexão, encerra a execução e mostra o erro
    die("Erro na conexão: " . $e->getMessage());
}
?>