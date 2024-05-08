<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Frota</title>
<!-- Adicione links para seus arquivos CSS aqui -->
</head>
<body>
    <h3>Cadastro de Frota</h3>
    <div class="background-container">
        <img class="logo" src="../../Img/bitrix-removebg-preview.png" width="210px">
        <form action="../Controller/BikeController.php?acao=cadastrar" method="POST" enctype="multipart/form-data">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="ano_fabricado">Ano de Fabricação:</label>
            <input type="text" id="ano_fabricado" name="ano_fabricado" required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>

            <label for="tipodeveiculo">Tipo de Veículo:</label>
            <input type="text" id="tipodeveiculo" name="tipodeveiculo" required>

            <label for="placaveiculo">Placa do Veículo:</label>
            <input type="text" id="placaveiculo" name="placaveiculo" required>

            <label for="imagem">Imagem:</label>
            <input type="file" id="imagem" name="imagem" accept="image/*" required>

            <input type="submit" value="Cadastrar">
        </form>
    
    <a class="volt" href="../../Portfolio/index.php">Voltar</a>
</div>
<div class="falling-shapes">
    <!-- Criar várias formas que caem -->
    <div class="falling-shape" style="left: 10%; animation-delay: 0s;"></div>
    <div class="falling-shape" style="left: 20%; animation-delay: 1s;"></div>
    <div class="falling-shape" style="left: 30%; animation-delay: 2s;"></div>
    <div class="falling-shape" style="left: 40%; animation-delay: 3s;"></div>
    <div class="falling-shape" style="left: 50%; animation-delay: 4s;"></div>
    <div class="falling-shape" style="left: 60%; animation-delay: 5s;"></div>
    <div class="falling-shape" style="left: 70%; animation-delay: 6s;"></div>
    <div class="falling-shape" style="left: 80%; animation-delay: 7s;"></div>
    <div class="falling-shape" style="left: 90%; animation-delay: 8s;"></div>
</div>

<style>
    h3{
        position: absolute;
        margin-left: 44%;
        top: 29%;
    }
    </style>


    <style>
    body {
        background-color: #1f9ea8;
    }

    .background-container {
        background-color: #cfcece;
        padding: 10px;
        border-radius: 10px;
        max-width: 600px;
        height: 630px;
        margin: 0 auto;
        margin-top: 30px;
        animation: changeColor 5s infinite;
    }
   .volt{
    margin-left: 45%;
    font-size: 22px;
    margin-top: 30px;
   }
    .container {
        text-align: center;
    }

    .logo {
        display: block;
        margin: 0 auto 20px;
    }

    form {
        margin-top: 20px;
    }

    table {
        margin: 0 auto;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    h3 {
        margin-top: 20px;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

   
    body {
        background-color: #001e27;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    
    .falling-shapes {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    
    .falling-shape {
        position: absolute;
        width: 10px; /* Largura da forma */
        height: 10px; /* Altura da forma */
        background-color: #ffffff; /* Cor da forma */
        border-radius: 50%; /* Forma circular */
        animation: falling 5s linear infinite; /* Animação de queda */
    }
    
    @keyframes falling {
        0% { transform: translateY(-100px); opacity: 0; } /* Posição inicial */
        100% { transform: translateY(100vh); opacity: 1; } /* Posição final */
    }
    
</style>
</body>
</html>
