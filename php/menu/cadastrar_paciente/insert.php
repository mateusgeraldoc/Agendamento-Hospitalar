

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <title>Hospital</title>
    <style>
        p{padding: 15px 0px; color: white; text-align: center;}
        h1{margin: 0px 90px 0px 130px;}
        .menu{display: flex; align-items: center;}
    </style>
</head>
<body>
    <div class="container">
    <div class="menu">
        <a href="../menu.php"><img id="logout-img" title="Logout" src="../../../img/seta-voltar.png"></a>
        <h1>MENU</h1>
    </div>
    <?php
        session_start();
        include_once("../../conexao.php");
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../../../index.html");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $telefone = $_POST['telefone'];
            $cep = $_POST['cep'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];

            $verifica = mysqli_query($conexao, "SELECT * FROM Pacientes WHERE Cpf='$cpf'");
            if(mysqli_num_rows($verifica) > 0){
                echo "<p>CPF já cadastrado!</p>";
                exit();
            } else {
                $verifica = true;
            }
        }

            if($verifica){

            $consulta = mysqli_query($conexao, "INSERT INTO Pacientes (Cpf, Nome, Idade, Telefone, Cep, Rua, Numero, Bairro, Cidade) VALUES ('$cpf', '$nome', '$idade', '$telefone', '$cep', '$rua', '$numero', '$bairro', '$cidade')");

            if($consulta){
                echo "<p>Paciente cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro ao cadastrar paciente: " . mysqli_error($conexao) . "</p>";
            }
        }
    ?>
    </div>
</body>
</html>