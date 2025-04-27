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
        .navbar { height: 150px; }
        .submit-filter { width: 5%; margin-right: 29%; height: 100%; }
        .input-search input { width: 30%; margin-left: 35%; }
        .container2{margin-top: 5%;}
    </style>
</head>
<body>
    <div class="navbar"> <!-- Navbar com o campo de pesquisa de CPF, botão de voltar e logout -->
        <div class="navbar-menu">
            <a href="../menu.php">
                <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
            </a>
            <h1>DADOS DO PACIENTE</h1>
            <div class="space"></div>
        </div>
        <div class="input-search"> <!-- Campo de pesquisa para o CPF do paciente -->
            <form style="display:flex; flex-direction:row" action="" method="POST">
                <input list="cpf" id="cpf" name="cpf" placeholder="Digite o CPF" required>
                <datalist id="cpf">
                    <?php
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
                    <h2>DADOS ENDERECO</h2>
                    <div class="input-container">   <!-- Input de CEP -->
                    <?php
                        if (isset($_POST['cpf'])) {
                            $cpf = $_POST['cpf'];
                            $sql = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
                            if ($row = mysqli_fetch_array($sql)) {
                                $cep = $row['Cep'];
                                echo "<input type='text' id='cep' name='cep' value='$cep'>";
                            } else {
                                echo "<input type='text' id='cep' placeholder='Cep' name='cep' readonly>";
                            }
                        } else {
                            echo "<input type='text' id='cep' placeholder='Cep' name='cep' readonly>";
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
                                echo "<input type='text' id='rua' name='rua' value='$rua' readonly>";
                            } else {
                                echo "<input type='text' id='rua' placeholder='Rua' name='rua' readonly>";
                            }
                        } else {
                            echo "<input type='text' id='rua' placeholder='Rua' name='rua' readonly>";
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
                                echo "<input type='text' id='numero' name='numero' value='$numero'>";
                            } else {
                                echo "<input type='text' id='numero' placeholder='Numero' name='numero' readonly>";
                            }
                        } else {
                            echo "<input type='text' id='numero' placeholder='Numero' name='numero' readonly>";
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
                                echo "<input type='text' id='bairro' name='bairro' value='$bairro' readonly>";
                            } else {
                                echo "<input type='text' id='bairro' placeholder='Bairro' name='bairro' readonly>";
                            }
                        } else {
                            echo "<input type='text' id='bairro' placeholder='Bairro' name='bairro' readonly>";
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
                                echo "<input type='text' id='cidade' name='cidade' value='$cidade' readonly>";
                            } else {
                                echo "<input type='text' id='cidade' placeholder='Cidade' name='cidade' readonly>";
                            }
                        } else {
                            echo "<input type='text' id='cidade' placeholder='Cidade' name='cidade' readonly>";
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
                $sql = "UPDATE Pacientes SET Nome='$nome', Idade='$idade', Telefone='$telefone', Cep='$cep', Rua='$rua', Numero='$numero', Bairro='$bairro', Cidade='$cidade' WHERE Cpf='$cpf'";
                mysqli_query($conexao, $sql);
                echo "<script>alert('Paciente atualizado com sucesso!');</script>";
            } elseif ($_POST['submit'] == 2) {
                $sql = "DELETE FROM Pacientes WHERE Cpf='$cpf'";
                mysqli_query($conexao, $sql);
                echo "<script>alert('Paciente excluído com sucesso!');</script>";
            }
        }
    ?>

<script>
    document.getElementById('cep').addEventListener('blur', function () {
        const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na consulta do CEP');
                    }
                    return response.json();
                })
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                    } else {
                        alert('CEP não encontrado.');
                        document.getElementById('rua').value = '';
                        document.getElementById('bairro').value = '';
                        document.getElementById('cidade').value = '';
                    }
                })
                .catch(() => alert('Erro ao buscar o CEP.'));
        } else {
            alert('CEP inválido.');
            document.getElementById('rua').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('cidade').value = '';
        }
    });
</script>
<script>
if(!<?php echo isset($_SESSION['usuario']) ? 'true' : 'false'; ?>) {
    window.location.href = "../../login/logout.php";
}
</script>
</body>
</html>