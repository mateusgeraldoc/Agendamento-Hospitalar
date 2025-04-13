<?php
session_start(); 
include_once("../conexao.php");

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $consulta = mysqli_query($conexao, "SELECT * FROM Usuarios WHERE Usuario = '$usuario' AND Senha = '$senha'") or die(mysqli_error($conexao));

    $resultado = mysqli_fetch_array($consulta);
        if($resultado){
            $_SESSION['nome'] = $resultado['Nome_usuario'];
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header("Location: ../menu/menu.php");
            exit();
        } else {
            header("Location: ../../index.html");
            exit();
        }
    }
?>