<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Crud/php/session.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/Crud/php/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <title>Hospital</title>
    <style>
        /*style navbar*/ 
        .navbar { height: 150px; }
        .submit-filter { width: 5%; margin-right: 29%; height: 100%; }
        .input-search input { width: 30%; margin-left: 35%; }
        
        /*style cabeçalho da tabela*/ 
        #cpf2{padding: 0 60px}
        #data{padding: 0 25px; padding-right: 50px}
        #hora{padding: 0 30px; padding-left: 20px}
        #excluir{padding: 0 25px}
        table{width: 95%; border-collapse: collapse; margin: 0 auto;}
        th {border: 1px solid black; padding: 10px; text-align: center; background-color: #0365B7;color: white; font-size: 1.5em;}
        
        /*style iframe*/ 
        .table{display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100%;}
        .iframe { width: 100%; height: calc(100vh - 280px); display: flex; justify-content: center; align-items: start; overflow-y: auto;}
        iframe {width: 100%; height: 135%; border: none;}
    </style>
</head>
<body> 
    <div class="navbar"> <!-- Navbar com o campo de pesquisa de CPF, botão de voltar e logout -->
        <div class="navbar-menu">
            <a href="../menu.php">
                <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
            </a>
            <h1>HISTORICO DE CONSULTAS</h1>
            <div class="space"></div>
        </div>
        <div class="input-search"> <!-- Campo de pesquisa para o CPF do paciente -->
            <form style="display:flex; flex-direction:row" action="relatorios_iframe.php" method="POST">
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
        <div class="table">
        <table>
            <tr>
            <th id="nome">Nome</th>
            <th id="cpf2">CPF</th>
            <th id="especialidade">Especialidade</th>
            <th id="data">Data</th>
            <th id="hora">Hora</th>
            <th id="excluir">Excluir</th>
            </tr>
        </table>
            <div class="iframe">
                <iframe src="relatorios_iframe.php"></iframe>
            </div>
        </div>
    </div>
    <script>
if(!<?php echo isset($_SESSION['usuario']) ? 'true' : 'false'; ?>) {
    window.location.href = "../../login/logout.php";
}
</script>
</body>
</html>