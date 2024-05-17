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
        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">   
        <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
        <div class="retangulo"></div> 
        
       
     

        <div class="texto-centralizado ">
          
            <div class="container">
            <h2>Criar Nova Solicitação</h2>
<form action="../MVC/public/Solicitacao/index.php?action=create" method="POST" class="form-solicitacao">
    <label for="solicitante">Solicitante:</label>
    <input type="text" id="solicitante" name="solicitante" required><br>
    <label for="responsavel">Responsável:</label>
    <input type="text" id="responsavel" name="responsavel" required><br>
    <label for="situacao">Situação:</label>
    <input type="text" id="situacao" name="situacao" required><br>
    <input type="submit" value="Criar">
</form>
</div>
   
</body>
</html>
