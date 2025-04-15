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
        <form action="insert.php" method="POST">
            <div class="container-wrapper">
                <div style="height: 505px;" class="container2">
                    <h2>DADOS PACIENTE</h2>
                    <div class="input-container">
                        <input type="text" placeholder="CPF" name="cpf" maxlength="14" required>
                    </div>
                    <div class="input-container">
                        <input type="text" placeholder="Nome" name="nome" required>
                    </div>
                    <div class="input-container">
                        <input type="number" placeholder="Idade" name="idade" required>
                    </div>
                    <div class="input-container">
                        <input type="text" placeholder="Telefone" name="telefone" maxlength="14" required>
                    </div>
                </div>
                <div class="container2">
                    <h2>DADOS ENDERECO</h2>
                    <div class="input-container">
                        <input type="text" id="cep" placeholder="CEP" name="cep" maxlength="8" required>
                    </div>
                    <div class="input-row">
                        <div class="input-container half-width">
                            <input type="text" id="rua" placeholder="Rua" name="rua" readonly required>
                        </div>
                        <div class="input-container half-width">
                            <input type="text" id="numero" placeholder="Número" name="numero" required>
                        </div>
                    </div>
                    <div class="input-container">
                        <input type="text" id="bairro" placeholder="Bairro" name="bairro" readonly required>
                    </div>
                    <div class="input-container">
                        <input type="text" id="cidade" placeholder="Cidade" name="cidade" readonly required>
                    </div>
                </div>
            </div>
            <button class="submit-button" type="submit">CADASTRAR</button>
        </form>
    </div>

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
</body>
</html>