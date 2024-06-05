<?php
require 'verificar_permissao.php';

verificarPermissao([1, 2, 3, 4, 5]);

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="../Css/estoque.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="comeco">
        <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
        <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png"></a>
    </div><br><br>
    <section>
        <div class="sidebar">
            <button onclick="window.location.href='../Portifolio/index.php'">Home</button>
            <button onclick="window.location.href='../php/controle_estoque.php'">Produtos Cadastrados</button>
        </div>
        <div class="container">
            <div class="text">Realizar solicitação</div>
            <div class="form-container">

                <form class="formstyle" action="../MVC/public/Solicitacao/index.php?action=create" method="POST"
                    class="form-solicitacao">
                    <label for="solicitante">Solicitante:</label>
                    <input type="text" id="solicitante" name="solicitante" required><br>
                    <label for="responsavel">Responsável:</label>
                    <input type="text" id="responsavel" name="responsavel" required><br>
                    <label for="pedido">Pedido:</label>
                    <input type="text" id="pedido" name="pedido" required><br>
                    <label for="situacao">Situação:</label>
                    <input type="text" id="situacao" name="situacao" required><br>
                    <input type="submit" value="Criar">
                </form>
            </div>
        </div>
        </section>

</body>

</html>