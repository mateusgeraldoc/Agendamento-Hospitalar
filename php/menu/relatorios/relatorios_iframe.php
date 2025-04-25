<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <title>Hospital</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centraliza horizontalmente */
            align-items: flex-start; /* Alinha ao topo */
            justify-content: flex-start; /* Alinha ao topo */
            padding-left: 2.5%; /* Ajusta para compensar a largura da tabela */
            height: 100vh;
        }

        table {
            width: 97.4%;
            border-collapse: collapse;
            margin: 0; /* Remove margem superior */
        }

        td {
            border-bottom: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: rgb(228, 228, 228);
            font-size: 1.2em;
        }

        td:nth-child(4), td:nth-child(5) {
            text-align: center; /* Centraliza as colunas de Data e Hora */
            font-weight: bold;
        }

        .submit-button {
            width: 70%; /* Define a largura do botão */
            margin: 0 auto; /* Centraliza o botão na coluna */
            color: black;
            border: none;
            padding: 5px;
            cursor: pointer;
            display: block; /* Garante que o botão seja tratado como um bloco */
        }

        .submit-button:hover {
            background-color: #0365B7;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
session_start();
include_once("../../conexao.php");

if (isset($_POST['submit'])) {
    $cod_consulta = $_POST['cod_consulta'];
    echo "<script>
        if (confirm('Deseja realmente cancelar a consulta?')) {
            window.location.href = 'relatorios_iframe.php?delete=' + $cod_consulta;
        }
    </script>";
}

if (isset($_GET['delete'])) {
    $cod_consulta = $_GET['delete'];
    $sql = mysqli_query($conexao, "DELETE FROM Consulta WHERE Cod_consulta='$cod_consulta'");

    if ($sql) {
        echo "<script>
            alert('Consulta cancelada com sucesso!');
            window.location.href = 'relatorios_iframe.php';
        </script>";
    } else {
        echo "<script>
            alert('A consulta Não foi cancelada.');
        </script>";
    }
}
    

// Consulta para exibir os dados

if (isset($_POST['cpf'])) {
    $cpf = $_POST['cpf'];
    $sql = mysqli_query($conexao, "SELECT * FROM Consulta 
        INNER JOIN Pacientes ON Consulta.Cod_paciente = Pacientes.Cod_paciente 
        INNER JOIN Especialidade ON Consulta.Cod_especialidade = Especialidade.Cod_especialidade 
        WHERE Cpf='$cpf' 
        ORDER BY Data, Hora");
} else {
$sql = mysqli_query($conexao, "SELECT * FROM Consulta 
    INNER JOIN Pacientes ON Consulta.Cod_paciente = Pacientes.Cod_paciente 
    INNER JOIN Especialidade ON Consulta.Cod_especialidade = Especialidade.Cod_especialidade 
    ORDER BY Data, Hora");
}
if (mysqli_num_rows($sql) > 0) {
    echo "<form action='' method='POST'>";
    echo "<table>";
    while ($row = mysqli_fetch_array($sql)) {
        $cod_consulta = $row['Cod_consulta'];
        $nome = $row['Nome'];
        $cpf = $row['Cpf'];
        $especialidade = $row['Nome_especialidade'];
        $data = $row['Data'];
        $hora = $row['Hora'];
        echo "<tr>
                <td>$nome</td>
                <td>$cpf</td>
                <td>$especialidade</td>
                <td>$data</td>
                <td>$hora</td>
                <td>
                    <form action='' method='POST'>
                        <input type='hidden' name='cod_consulta' value='$cod_consulta'>
                        <button class='submit-button' name='submit' type='submit'>CANCELAR</button>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "<p style='padding: 5% 38%; font-size: 1.2em;'>Nenhuma consulta foi encontrada.</p>";
}
?>
</body>
</html>