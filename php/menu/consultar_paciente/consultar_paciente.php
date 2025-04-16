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
    </style>
</head>
<body> 
    <div class="navbar"> <!-- Navbar com o campo de pesquisa de CPF, botão de voltar e logout -->
        <div class="navbar-menu">
            <a href="../menu.php">
                <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
            </a>
            <h1>DADOS DO PACIENTE</h1>
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
                        echo "<option value='$cpf'></option>";
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
        <form action="" method="POST">
            <div class="container-wrapper">
                <div style="height: 505px;" class="container2">
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
                    <div class="input-container">   <!-- Input de Idade -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $idade = $row['Idade'];
                                echo "<input type='text' name='idade' value='$idade'>";
                            } else {
                                echo "<input type='text' placeholder='Idade' name='idade' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Idade' name='idade' readonly>";
                        }
                        ?>
                    </div>
                    <div class="input-container">   <!-- Input de Telefone -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $telefone = $row['Telefone'];
                                echo "<input type='text' name='telefone' value='$telefone'>";
                            } else {
                                echo "<input type='text' placeholder='Telefone' name='telefone' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Telefone' name='telefone' readonly>";
                        }
                        ?>
                    </div>
                </div>
                <div class="container2">
                    <h2>DADOS ENDEREÇO</h2>
                    <div class="input-container">   <!-- Input de CEP -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $cep = $row['Cep'];
                                echo "<input type='text' name='cep' value='$cep'>";
                            } else {
                                echo "<input type='text' placeholder='Cep' name='cep' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Cep' name='cep' readonly>";
                        }
                        ?>
                    </div>
                    <div class="input-row">
                        <div class="input-container half-width">    <!-- Input de Rua -->
                        <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $rua = $row['Rua'];
                                echo "<input type='text' name='rua' value='$rua' readonly>";
                            } else {
                                echo "<input type='text'placeholder='Rua' name='rua' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Rua' name='rua' readonly>";
                        }
                        ?>
                        </div>
                        <div class="input-container half-width">    <!-- Input de Numero da Rua -->
                        <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $numero = $row['Numero'];
                                echo "<input type='text' name='numero' value='$numero'>";
                            } else {
                                echo "<input type='text'placeholder='Numero' name='numero' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Numero' name='numero' readonly>";
                        }
                        ?>
                        </div>
                    </div> 
                    <div class="input-container">   <!-- Input de Bairro -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $bairro = $row['Bairro'];
                                echo "<input type='text' name='bairro' value='$bairro' readonly>";
                            } else {
                                echo "<input type='text' placeholder='Bairro' name='bairro' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Bairro' name='bairro' readonly>";
                        }
                        ?>
                    </div>
                    <div class="input-container">   <!-- Input de Cidade -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $cidade = $row['Cidade'];
                                echo "<input type='text' name='cidade' value='$cidade' readonly>";
                            } else {
                                echo "<input type='text' placeholder='Cidade' name='cidade' readonly>";
                            }
                        } else {
                            echo "<input type='text' placeholder='Cidade' name='cidade' readonly>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="input-row"> <!-- Botões de UPDATE ou DELETE dos dados do Paciente-->
            <button id="update" value="1" class="submit-button" name="submit" type="submit">ATUALIZAR</button>
            <button id="delete" value="2" class="submit-button" name="submit" type="submit">EXCLUIR</button>
            </div>
        </form>
    </div>
    <?php
    // Recebimento dos dados com base no CPF selecionado
        if(isset($_POST['submit'])) {
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $telefone = $_POST['telefone'];
            $cep = $_POST['cep'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];

            //Atualiza ou Deleta os dados do paciente dependendo do botão pressionado 
            // 1 = Atualizar, 2 = Deletar
            if ($_POST['submit'] == 1) {
                $sql = "UPDATE Pacientes SET Cpf='$cpf', Nome='$nome', Idade='$idade', Telefone='$telefone', Cep='$cep', Rua='$rua', Numero='$numero', Bairro='$bairro', Cidade='$cidade' WHERE Cpf='$cpf'";
                mysqli_query($conexao, $sql);
                echo "<script>alert('Paciente atualizado com sucesso!');</script>";
            } elseif ($_POST['submit'] == 2) {
                $sql = "DELETE FROM Pacientes WHERE Cpf='$cpf'";
                mysqli_query($conexao, $sql);
                echo "<script>alert('Paciente excluído com sucesso!');</script>";
            }
        }
    ?>
</body>
</html>