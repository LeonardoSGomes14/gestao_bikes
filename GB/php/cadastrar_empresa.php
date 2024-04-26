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
    <link rel="stylesheet" href="../Css/cadastro_empresa.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="top-banner">
        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">
        <div class="texto-banner"> Sistema De Gestão ERP+controle de empresas e de pessoas </div>
        <div class="texto1">Cadastro de Empresas</div>
    </div>

    <div class="container">

        <form action="processar_cadastro_empresa.php" method="post">
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

            <input type="image" src="../../GB/Img/seta.png" width="85" height="41" class="cadastro-img">
        </form>

    </div>
    <div class="barra">.</div>

    <div class="icons">
        <a href="https://www.facebook.com/" target="_blank">
            <img class="face" src="../Img/facebook-logo.png" width="30"></a>
        <a href="https://twitter.com/login?lang=pt" target="_blank">
            <img class="face" src="../Img/x-logo.png" width="34"></a>
        <a href="https://www.youtube.com/" target="_blank">
            <img class="face" src="../Img/youtube-logo.png" width="30"></a>
        <a href="https://br.pinterest.com/" target="_blank">
            <img class="face" src="../Img/pinterest-logo.png" width="30"></a>
        <a href="https://www.instagram.com/" target="_blank">
            <img class="face" src="../Img/instagram-logo.png" width="30"></a>
        <a href="https://www.tiktok.com/pt-BR/" target="_blank">
            <img class="face" src="../Img/tiktok-logo.png" width="30"></a>
    </div>

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
