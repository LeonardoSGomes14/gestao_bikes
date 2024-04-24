<link rel="stylesheet" href="../Css/cadasro_empresa.css">
<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

class Empresa {

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $empresa = new Empresa();
   
} else if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['cep'])) {
    $cep = $_GET['cep'];

    $sql = "SELECT estado, rua FROM tabela_de_cep WHERE cep = '$cep'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array('estado' => $row['estado'], 'rua' => $row['rua']);
        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'CEP não encontrado'));
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="../GB/Css/cadasro_empresa.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="top-banner"></div>

    <!-- Novo banner azul escuro no topo -->
    <div class="container">

        
        <form action="processar_cadastro_empresa.php" method="post">
            <h2>Cadastro de Empresa</h2>
            <label for="nome">Nome da Empresa:</label><br>
            <input type="text" id="nome" name="nome" required><br>

            <label for="servicos">Serviços:</label><br>
            <input type="text" id="servicos" name="servicos" required><br>

            <label for="cnpj">CNPJ:</label><br>
            <input type="text" id="cnpj" name="cnpj" required><br>

            <label for="cep">CEP:</label><br>
            <input type="text" id="cep" name="cep" required><br>
            <button type="button" onclick="consultarCEP()">Consultar</button><br>

            <label for="estado">Estado:</label><br>
            <input type="text" id="estado" name="estado" readonly><br>

            <label for="rua">Rua:</label><br>
            <input type="text" id="rua" name="rua" readonly><br>

            <label for="numero">Número:</label><br>
            <input type="text" id="numero" name="numero" required><br>

            <input type="submit" value="Cadastrar">
        </form>

    </div>

    <footer class="footer">
        <div class="social-icons">
            <a href="#"><img src="icone_facebook.png" alt="Facebook"></a>
            <a href="#"><img src="icone_twitter.png" alt="Twitter"></a>
            <a href="#"><img src="icone_instagram.png" alt="Instagram"></a>
        </div>
    </footer>

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