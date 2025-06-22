<?php
// Inicia a sessão para gerenciar o estado do usuário
session_start();

// Verifica se o usuário está autenticado, caso contrário redireciona para a página de login
if(!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Inicial</title>
    <!-- Importação da fonte Roboto do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Favicon do site -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!-- Arquivo CSS específico para o dashboard -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <!-- Cabeçalho com logo e menu de navegação -->
    <header class="header">
        <div class="logo">
            <img src="assets/img/meu_cafe.png" alt="Logo do site" width="30" height="30">
            MeuSite
        </div>
        <!-- Menu de navegação principal -->
        <nav class="nav">
            <a href="#">Início</a>
            <a href="#">Sobre</a>
            <a href="#">Serviços</a>
            <a href="#">Contato</a>
            <a href="logout.php" class="btn-logout">Sair</a>
        </nav>
    </header>

    <!-- Conteúdo principal da página -->
    <main>
        <!-- Seção hero com título e chamada para ação -->
        <section class="hero">
            <h1>Bem-vindo ao MeuSite</h1>
            <p>Um espaço simples, moderno e adaptável para seu projeto ou negócio.</p>
            <a href="#" class="btn">Saiba mais</a>
        </section>

        <!-- Seção de características/recursos -->
        <section class="features">
            <!-- Box de característica: Responsivo -->
            <div class="feature-box">
                <h3>Responsivo</h3>
                <p>Layout que se adapta a qualquer dispositivo.</p>
            </div>

            <!-- Box de característica: Fácil de usar -->
            <div class="feature-box">
                <h3>Fácil de usar</h3>
                <p>Interface clara, direta e intuitiva.</p>
            </div>

            <!-- Box de característica: Customizável -->
            <div class="feature-box">
                <h3>Customizável</h3>
                <p>Personalize como quiser com poucas alterações.</p>
            </div>
        </section>
    </main>

    <!-- Rodapé da página -->
    <footer class="footer">
        <p>&copy; MeuSite. Todos os direitos reservados.</p>
    </footer>
</body>
</html>