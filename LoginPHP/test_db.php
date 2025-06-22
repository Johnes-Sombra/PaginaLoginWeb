<?php
require_once 'includes/db.php';

try {
    // Testa a conexão
    echo "Conexão com o banco de dados: OK<br>";
    
    // Verifica se a tabela users existe
    $stmt = $conn->query("SHOW TABLES LIKE 'users'");
    if($stmt->rowCount() > 0) {
        echo "Tabela 'users': OK<br>";
        
        // Verifica se existe algum usuário
        $stmt = $conn->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "Número de usuários cadastrados: " . count($users) . "<br>";
        
        // Mostra os usuários (apenas usernames)
        echo "Usuários cadastrados:<br>";
        foreach($users as $user) {
            echo "- " . htmlspecialchars($user['username']) . "<br>";
        }
    } else {
        echo "ERRO: Tabela 'users' não existe!<br>";
    }
    
} catch(PDOException $e) {
    echo "ERRO: " . $e->getMessage();
}
?>