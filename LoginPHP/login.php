<?php
// Inicia a sessão PHP
session_start();

// Inclui o arquivo de conexão com o banco
require_once 'includes/db.php';

// Verifica se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém e limpa os dados do formulário
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Verifica se os campos estão preenchidos
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Preencha todos os campos");
        exit;
    }

    try {
        // Prepara e executa a consulta SQL para buscar o usuário
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Verifica se o usuário existe e a senha está correta
        if ($user && password_verify($password, $user['password'])) {
            // Cria as variáveis de sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redireciona para o dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            // Usuário ou senha incorretos
            header("Location: index.php?error=Usuário ou senha incorretos");
            exit;
        }
    } catch(PDOException $e) {
        // Erro no banco de dados
        header("Location: index.php?error=Erro no sistema");
        exit;
    }
} else {
    // Se não for POST, redireciona para a página de login
    header("Location: index.php");
    exit;
}
?>