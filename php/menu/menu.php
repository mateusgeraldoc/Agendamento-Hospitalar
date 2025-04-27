<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Crud/php/session.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Crud/php/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Hospital</title>
    <style>
        p{padding: 15px 0px; color: black;}
        h1{margin: 0px 90px 0px 160px;}
        .menu{display: flex; align-items: center;}
        .submit-button{text-align: center;}
    </style>
</head>
<body>
    <div class="container">
    <div class="menu">
        <h1>MENU</h1>
        <a href="../login/logout.php"><img id="logout-img" title="Logout" src="../../img/sair.png"></a>
    </div>
        <a href="cadastrar_paciente/cadastrar_paciente.php">
            <div class="submit-button">
                <p>CADASTRAR PACIENTE</p>
            </div>
        </a>
        <a href="consultar_paciente/consultar_paciente.php">
            <div class="submit-button">
                <p>CONSULTAR PACIENTE</p>
            </div>
        </a>
        <a href="agendar_consulta/agendar_consulta.php">
            <div class="submit-button">
                <p>AGENDAR CONSULTA</p>
            </div>
        </a>
        <a href="relatorios/relatorios.php">
            <div class="submit-button">
                <p>RELATORIOS</p>
            </div>
        </a>
    </div>
    <script>
if(!<?php echo isset($_SESSION['usuario']) ? 'true' : 'false'; ?>) {
    window.location.href = "../../login/logout.php";
}
</script>
</body>
</html>