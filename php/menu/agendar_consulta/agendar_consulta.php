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
        .container2{text-align: center; margin: auto;}
        .submit-button{width: 100%;}
    </style>
</head>
<body> 
    <div class="navbar"> <!-- Navbar com o campo de pesquisa de CPF, botão de voltar e logout -->
        <div class="navbar-menu">
            <a href="../menu.php">
                <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
            </a>
            <h1>DADOS DA CONSULTA</h1>
            <div class="space"></div>
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
        <form action="insert.php" method="POST">
                <div style="height: 525px;" class="container2">
                    <h2>DADOS PACIENTE</h2>
                    <!-- Cada input recebe os dados do paciente com base no CPF -->
                    <!-- Input de CPF -->
                    <div class="input-container">
                        <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                echo "<input type='text' name='cpf' value='$cpf' readonly>";
                            } else {
                                echo "<input type='text' placeholder='CPF não encontrado' name='cpf' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='CPF' name='cpf' readonly>";
                        }
                        ?>
                    </div>
                    <div class="input-container">  <!-- Input de Nome -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $nome = $row['Nome'];
                                echo "<input type='text' name='nome' value='$nome'>";
                            } else {
                                echo "<input type='text' placeholder='Nome' name='nome' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Nome' name='nome' readonly>";
                        }
                        ?>
                    </div>
                    <div class="input-container">   <!-- Select de Especialidade -->
                        <select  name="especialidade" required>
                            <option value="" disabled selected>Especialidade..</option>
                            <?php
                            $sql = mysqli_query($conexao, "SELECT * FROM Especialidade");
                            while ($row = mysqli_fetch_array($sql)) {
                                $cod_especialidade = $row['Cod_especialidade'];
                                $especialidade = $row['Nome_especialidade'];
                                echo "<option value='$cod_especialidade'>$especialidade</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-row">
                        <div class="input-container half-width"> <!-- Input de Hora -->
                        <?php
                            echo "<input type='time'  name='hora'>";
                        ?>
                        </div>
                        <div class="input-container half-width"> <!-- Input de Hora -->
                        <?php
                            echo "<input type='date' placeholder='Data'  name='data'>";
                        ?>
                        </div>
                    </div>  
                    <button id="delete" class="submit-button" name="submit" type="submit">AGENDAR</button>
                </div>
            </div>
        </form>
    </div>
    <div class="footer"></div>
</body>
</html>