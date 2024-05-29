<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/solicitacao.css">
    <title>GESTÃO DE BIKES</title>
</head>

<body>
  
<div class="comeco">

        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
      <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png"></a> 
    </div>

    <section>
    <div class="sidebar">
    <button onclick="window.location.href='../Portifolio/index.php'">Home</button>
        <button onclick="window.location.href='../MVC/public/Solicitacao/index.php'">Solicitações Pendentes</button>
        <button onclick="window.location.href='../php/solicitacaoatendidas.php'">Solicitações Atendidas</button>
        <button onclick="window.location.href='../php/recibosolicitacao.php'">Recibo</button>
    </div>   
            <div class="container">
      
<form action="../MVC/public/Solicitacao/index.php?action=create" method="POST" class="form-solicitacao">
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
   </section>
</body>
</html>