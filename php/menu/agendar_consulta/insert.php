<?php
    session_start();
    include_once("../../conexao.php");

            if (isset($_POST["submit"])) {
                $cpf = $_POST['cpf'];
                $sql = mysqli_query($conexao,"SELECT Cod_paciente FROM Pacientes WHERE Cpf='$cpf'");
                if ($row = mysqli_fetch_array($sql)) {
                    $cod_paciente = $row["Cod_paciente"];
                }
                $especialidade = $_POST['especialidade'];
                $hora = $_POST['hora'];
                $data = $_POST['data'];

                $insert = mysqli_query($conexao,"INSERT INTO Consulta (Cod_paciente, Cod_especialidade, Hora, Data) VALUES ('$cod_paciente', '$especialidade', '$hora', '$data')");
                if ($insert) {
                    echo "<script>alert('Consulta agendada com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao agendar consulta.');</script>";
                }
                header("Location: agendar_consulta.php");
                exit();
            }
?>