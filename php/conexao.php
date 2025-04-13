<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "hospital";

$conexao = new mysqli($servername, $username, $password, $dbname);

if($conexao->connect_error){
    die("Erro de Conexão: " . $conexao->connect_error);
}
?>


