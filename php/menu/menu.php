<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Hospital</title>
    <style>
        .submit-button{
            text-align: center;
        }
        p{
            padding: 15px 0px;
            color: black;
        }
        .menu{
            display: flex;
            align-items: center;
        }
        h1{
            margin: 0px 90px 0px 160px;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    include_once("../conexao.php");
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../../index.html");
        exit();
    }
    ?>

    <div class="container">
    <div class="menu">
        <h1>MENU</h1>
        <a href="../../index.html"><img id="logout-img" title="Logout" src="../../img/sair.png"></a>
    </div>
    
        <a href="">
            <div class="submit-button">
                <p>CADASTRAR PACIENTE</p>
            </div>
        </a>
        <a href="">
            <div class="submit-button">
                <p>CONSULTAR PACIENTE</p>
            </div>
        </a>
        <a href="">
            <div class="submit-button">
                <p>AGENDAR CONSULTA</p>
            </div>
        </a>
        <a href="">
            <div class="submit-button">
                <p>RELATORIOS</p>
            </div>
        </a>
    </div>
</body>
</html>