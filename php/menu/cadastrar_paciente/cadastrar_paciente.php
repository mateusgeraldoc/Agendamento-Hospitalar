<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <title>Hospital</title>
</head>
<body>
    <div class="navbar">
        <a href="../menu.php">
            <img id="logout-img" title="Voltar" src="../../../img/seta-voltar.png">
        </a>
        <h1>CADASTRO PACIENTE</h1>
        <a href="../../index.html">
            <img id="logout-img" title="Logout" src="../../../img/sair.png">
        </a>
    </div>
    <div class="main">
        <form action="" method="POST">
        <div class="container-wrapper">
            <div class="container2">
                <h2>DADOS PACIENTE</h2>
                <div class="input-container">
                    <input type="text" pattern="\d{3}-\d{3}-\d{3}-\d{2}" placeholder="CPF" name="cpf" maxlength="11" required>
                </div>
                <div class="input-container">
                    <input type="text" placeholder="Nome" name="nome" required>
                </div>
                
                <div class="input-container">
                    <input type="number" placeholder="Idade" name="idade" required>
                </div>
                <div class="input-container">
                    <input type="text" pattern="\(\d{2}\)\d{4}-\d{4}" placeholder="Telefone" name="telefone" maxlength="10" required>
                </div>
            </div>
            <div class="container2">
                <h2>DADOS ENDERECO</h2>
                <div class="input-container">
                    <input type="text" placeholder="Rua" name="rua" required>
                </div>
                <div class="input-container">
                    <input type="text" placeholder="Numero" name="numero" required>
                </div>
                <div class="input-container">
                    <input type="text" placeholder="CEP" name="cep" required>
                </div>
                <div class="input-container">
                    <input type="text" placeholder="Bairro" name="bairro" required>
                </div>
            </div>
        </div>
        <button class="submit-button" type="submit">CADASTRAR</button>
        </form>
    </div>
</body>
</html>