<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="comeco">
<h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
<img class="logo" src="../../Img/bitrix-removebg-preview.png" width="300px">
      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <div class="text-cadastro">Cadastro de Empresas</div>
     <br>
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


    <div class="rodape">

<a class="entra" href="../../../GB/Portifolio/index.php">Voltar</a>
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








<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1f9ea8;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], button[type="button"], button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="button"], button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        button[type="button"]:hover, button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .volt {
            display: block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .volt:hover {
            text-decoration: underline;
        }
        .comeco {
            background-color: #001e27;
            width: 100%; 
            height: 180px;
            margin-left: -1px;
            margin-top: -9px;
            position: absolute;
        }
        .titulo{
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            position: absolute;
            left: 370px;
            top: 30px;
        }
        .logo{
  position: absolute;
  top: -22%;
  width: 200px;
  top: -10px;
}
.rodape{

margin-top: 150px;
background-color: #001e27; 
padding: 40px 0; 
text-align: center; 
}

.entra {
    text-decoration: none;
    background-color: transparent;
    color: rgb(255, 255, 255);
    border: 1px solid rgb(255, 255, 255);
    border-radius: 30px;
    padding: 15px 40px;
    font-size: 15px;
    display: inline-block;
    margin: 11px 400px;
    transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Adicionando uma transição suave para o tamanho */
    font-family: Arial, Helvetica, sans-serif;
  }
  
  .entra:hover {
    transform: scale(1.1); /* Aumentando o tamanho em 10% ao passar o mouse */
  }
  .text-cadastro{
color:black;
font-weight: bold;
font-size:26px;
margin-top:-45px;
margin-left:41%;
font-weight: 700;
  }
  @media screen and (max-width: 768px) {
  /* Oculta o texto do banner em telas menores que 768px */
  .titulo {
      display: none;
  }
  .logo {
      margin-left:35%;
  }
  .rodape  {
      margin-top:100px;
      margin-left:-30px;
  }
 .entra {
      margin-left:298px;
 }  
 .text-cadastro {
    margin-left:27%;
 }
}
    </style>
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
