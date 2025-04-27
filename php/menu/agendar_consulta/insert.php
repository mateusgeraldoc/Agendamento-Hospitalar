<?php
session_start();
include_once("../../conexao.php");

if (isset($_POST["submit"])) {
    $cpf = $_POST['cpf'];
    $sql = mysqli_query($conexao, "SELECT Cod_paciente FROM Pacientes WHERE Cpf='$cpf'");
    if ($row = mysqli_fetch_array($sql)) {
        $cod_paciente = $row["Cod_paciente"];
    } else {
        echo "<script>
            alert('CPF não encontrado.');
            window.location.href = 'agendar_consulta.php';
        </script>";
        exit();
    }

    $especialidade = $_POST['especialidade'];
    $hora = $_POST['hora'];
    $data = $_POST['data'];

    $verifica = mysqli_query($conexao, "SELECT * FROM Consulta WHERE Data='$data' AND Hora='$hora' AND Cod_especialidade='$especialidade'");
    if (mysqli_num_rows($verifica) > 0) {
        echo "<script>
            alert('Já existe uma consulta desta especialidade agendada para este horário e dia.');
            window.location.href = 'agendar_consulta.php';
        </script>";
        exit();
    } else {
        $insert = mysqli_query($conexao, "INSERT INTO Consulta (Cod_paciente, Cod_especialidade, Hora, Data) VALUES ('$cod_paciente', '$especialidade', '$hora', '$data')");
        if ($insert) {
            echo "<script>
                alert('Consulta agendada com sucesso!');
                window.location.href = 'agendar_consulta.php';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Erro ao agendar consulta.');
                window.location.href = 'agendar_consulta.php';
            </script>";
            exit();
        }
    }
}
?>