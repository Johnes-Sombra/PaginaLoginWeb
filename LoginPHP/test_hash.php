<?php
require_once 'includes/db.php';

// Senha que queremos testar
$senha_teste = 'admin123';

// Gerar um novo hash para comparação
$novo_hash = password_hash($senha_teste, PASSWORD_DEFAULT);

try {
    // Buscar o usuário no banco
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->execute(['admin']);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    echo "=== Teste de Hash de Senha ===\n";
    echo "1. Hash atual no banco: " . $user['password'] . "\n";
    echo "2. Novo hash gerado: " . $novo_hash . "\n";
    
    // Testar a senha com o hash do banco
    $verify = password_verify($senha_teste, $user['password']);
    echo "3. Verificação da senha com hash do banco: " . ($verify ? 'SUCESSO' : 'FALHA') . "\n";
    
    // Testar a senha com o novo hash
    $verify_novo = password_verify($senha_teste, $novo_hash);
    echo "4. Verificação da senha com novo hash: " . ($verify_novo ? 'SUCESSO' : 'FALHA') . "\n";
    
    if (!$verify && $verify_novo) {
        echo "\nO hash no banco parece estar incorreto. Use este comando SQL para atualizar:\n";
        echo "UPDATE users SET password = '" . $novo_hash . "' WHERE username = 'admin';\n";
    }
    
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>