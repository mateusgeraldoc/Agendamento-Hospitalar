<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <title>Hospital</title>
    <style>
        .navbar { height: 150px; }
        .submit-filter { width: 5%; margin-right: 29%; height: 100%; }
        .input-search input { width: 30%; margin-left: 35%; }
        .iframe {
            width: 100%;
            height: calc(100vh - 200px); /* Altura total menos a altura do navbar */
            display: flex;
            justify-content: center;
            align-items: start;
            margin-top: 160px;
            overflow-y: auto;
        }

        iframe {
            width: 100%;
            height: 135%;
            border: none;
        }
        table{width: 100%; border-collapse: collapse; margin: auto;}
        th, td {border: 1px solid black; padding: 10px; text-align: center;}
    </style>
</head>
<body> 
    <div class="navbar"> <!-- Navbar com o campo de pesquisa de CPF, botão de voltar e logout -->
        <div class="navbar-menu">
            <a href="../menu.php">
                <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
            </a>
            <h1>DADOS DA CONSULTA</h1>
            <a href="../../index.html">
                <img id="logout-img" title="Logout" src="../../../img/sair.png">
            </a>
        </div>
        <div class="input-search"> <!-- Campo de pesquisa para o CPF do paciente -->
            <form style="display:flex; flex-direction:row" action="" method="POST">
                <input list="cpf" id="cpf" name="cpf" placeholder="Digite o CPF" required>
                <datalist id="cpf">
                    <?php
                    session_start();
                    include_once("../../conexao.php");

                    $sql = mysqli_query($conexao, "SELECT Cpf FROM Pacientes");
                    while ($row = mysqli_fetch_array($sql)) {
                        $cpf = $row['Cpf'];
                        echo "<option value='$cpf'>$cpf</option>";
                    }
                    ?>
                </datalist>
                <button type="submit" class="submit-filter">
                    <img src="../../../img/filtrar.png">
                </button>
            </form>
        </div>
    </div>
    <div class="main">
        <div class="iframe">
            <iframe src="relatorios_iframe.php"></iframe>
        </div>
    </div>
</body>
</html>