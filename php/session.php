<?php
// session.php - DEVE ser o primeiro arquivo incluído em todas as páginas protegidas

// Configurações de sessão segura
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Use apenas se estiver com HTTPS
ini_set('session.use_strict_mode', 1);

session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // Redireciona para logout que vai limpar a sessão
    header("Location: logout.php");
    exit();
}

// Verifica se o token de sessão é válido (proteção contra fixation)
if (!isset($_SESSION['user_agent'])) {
    $_SESSION['user_agent'] = md5($_SERVER['HTTP_USER_AGENT']);
} elseif ($_SESSION['user_agent'] !== md5($_SERVER['HTTP_USER_AGENT'])) {
    session_unset();
    session_destroy();
    header("Location: logout.php");
    exit();
}
?>