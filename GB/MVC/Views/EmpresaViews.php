<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <a class="volt" href="cadastrar_empresa.php">Voltar</a>
    <form action="" method="post">
        <label for="nome">Nome da Empresa:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="servicos">Serviços:</label><br>
        <input type="text" id="servicos" name="servicos" required><br>

        <label for="cnpj">CNPJ:</label><br>
        <input type="text" id="cnpj" name="cnpj" required><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep" required><br><br>
        <button type="button" onclick="consultarCEP()">Consultar</button><br><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" readonly><br>

        <label for="rua">Rua:</label><br>
        <input type="text" id="rua" name="rua" readonly><br>

        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <script>
        function consultarCEP() {
            var cep = document.getElementById('cep').value;
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        document.getElementById('estado').value = data.uf;
                        document.getElementById('rua').value = data.logradouro;
                    }
                })
                .catch(error => {
                    console.error('Erro ao consultar o CEP:', error);
                    alert('Erro ao consultar o CEP.');
                });
        }
    </script>
</body>
</html>

<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

// Recebe os dados do formulário e processa o cadastro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $servicos = $_POST['servicos'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    // Lógica para inserir os dados no banco de dados
    try {
        $stmt = $pdo->prepare("INSERT INTO cadastro_empresa (nome, servicos, cnpj, cep, estado, rua, numero) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $servicos, $cnpj, $cep, $estado, $rua, $numero]);

        echo "Empresa cadastrada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar empresa: " . $e->getMessage();
    }
}
?>
