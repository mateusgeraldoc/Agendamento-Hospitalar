<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Hospital</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" target="_self">
            <h1>CADASTRO COLABORADOR</h1>
            <div class="input-container">
                <input type="text" placeholder="Nome" name="nome" required>
            </div>
            <div class="input-container">
                <input type="text" placeholder="Usuario" name="usuario" required>
            </div>
            <div class="input-container">
                <input type="password" placeholder="Senha" name="senha" required>
            </div>
            <button class="submit-button" type="submit">CADASTRAR</button>
        </form>
    </div>
    <?php
    session_start();
    include_once("../conexao.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = mysqli_query($conexao, "INSERT INTO Usuarios (Nome_usuario, Usuario, Senha) VALUES ('$nome', '$usuario', '$senha')");
        if ($sql) {
            header("Location: ../../index.html");
            exit();
        } else {
            echo "<p>Erro ao cadastrar colaborador: " . mysqli_error($conexao) . "</p>";
        }
    }
    ?>
</body>
</html>