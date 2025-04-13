<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Hospital - Acesso ADM</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" target="_self">
            <h1>ADMINISTRADOR</h1>
            <div class="input-container">
                <input type="password" placeholder="Chave de Acesso" name="senha" required>
            </div>
            <button class="submit-button" type="submit">CONCLUIR</button>
        </form>
        <?php
        include_once("../conexao.php");

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $chave = $_POST['senha'];

            $consulta = mysqli_query($conexao, "SELECT * FROM Acesso");
            $resultado = mysqli_fetch_array($consulta);

            if($resultado['senha'] == $chave){
                header("Location: cadastro_colaborador.php");
                exit();
            } else {
                echo "<p>Chave de Acesso Incorreta</p>";
            } 
        }
        ?>
    </div>
</body>
</html>