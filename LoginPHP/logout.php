<?php
// Inicia a sessão PHP
session_start();

// Destrói todas as variáveis de sessão
session_destroy();

// Redireciona para a página de login
header("Location: index.php");
exit;
?>