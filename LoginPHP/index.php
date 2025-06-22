<?php
// Inicia a sessão PHP
session_start();

// Se já existe uma sessão ativa, redireciona para o dashboard
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicon e estilo CSS -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <!-- Container principal do formulário de login -->
    <div class="login-container">
        <!-- Área dos logotipos -->
        <div class="logos">
            <img src="assets/img/ktn_png.png" alt="Logo 1">
            <span class="arrow">⬌</span>
            <img src="assets/img/meu_cafe.png" alt="Logo 2">
        </div>

        <!-- Formulário de login -->
        <form action="login.php" method="POST">
            <!-- Campo de usuário -->
            <label for="username">Usuário</label>
            <input type="text" id="username" name="username" 
                   placeholder="Digite seu usuário" required>

            <!-- Campo de senha -->
            <label for="password">Senha</label>
            <input type="password" id="password" name="password" 
                   placeholder="Digite sua senha" required>

            <!-- Botões de ação -->
            <div class="buttons">
                <button type="submit" class="btn-login">Login</button>
                <button type="button" class="btn-forgot" 
                        onclick="alert('Contate o suporte.')">Esqueci minha senha</button>
            </div>
        </form>

        <!-- Área de mensagens de erro -->
        <?php if(isset($_GET['error'])): ?>
            <div class="message error"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </div>
</body>
</html>