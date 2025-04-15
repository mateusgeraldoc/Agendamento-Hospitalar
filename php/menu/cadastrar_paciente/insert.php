<?php
session_start();
include_once("../../conexao.php");

$verifica = isset[REQUEST_METHOD == 'POST'];
if($verifica){
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
}




?>