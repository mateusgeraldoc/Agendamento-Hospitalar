<?php
// login.php
require_once("../conexao.php");

// Configurações de sessão segura
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Use apenas se estiver com HTTPS
ini_set('session.use_strict_mode', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM Usuarios WHERE Usuario = ? AND Senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc();
        
        // Regenera o ID da sessão para prevenir fixation
        session_regenerate_id(true);
        
        $_SESSION['nome'] = $dados['Nome_usuario'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['user_agent'] = md5($_SERVER['HTTP_USER_AGENT']);
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['created'] = time();
        
        header("Location: ../menu/menu.php");
        exit();
    } else {
        header("Location: ../../index.html?erro=login_invalido");
        exit();
    }
}
?>