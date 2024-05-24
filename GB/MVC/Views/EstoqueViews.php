
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="../../Css/estoque.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="retangulo"></div>
<div class="comeco">
<h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
<img class="logo" src="../../Img/bitrix-removebg-preview.png" width="300px">
      </div>
    <div class="sidebar">
        <button onclick="window.location.href='../../portifolio/index.php'">Home</button>
        <button onclick="window.location.href='../../php/listar_produtos.php'">Produtos Cadastradas</button>
        
    </div>

    <div class="container">

   
    <form action="../public/Estoque/Resultado.php" method="POST" enctype="multipart/form-data">
    <form action="" method="post">
        <label for="nome_produto">Nome do Produto:</label><br>
        <input type="text" id="nome_produto" name="nome_produto" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <label for="tipo">Tipo:</label><br>
        <input type="text" id="tipo" name="tipo" required><br>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="fornecedor">Fornecedor:</label><br>
        <input type="text" id="fornecedor" name="fornecedor" required><br>

        <label for="imagem">Imagem:</label><br>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <input type="submit" value="Cadastrar">

    </form>
    </div>
    <div class="rodape">

<a class="entra" href="../../../GB/Portifolio/index.php">Voltar</a>
</div>
<div class="text-cadastro">Cadastro de Produtos</div>
 <style>
       body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1f9ea8;
        }
        form {
            max-width: 400px;
            margin: 170px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top:205px;
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
        .rodape{

margin-top: -45px;
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
  .comeco {
            background-color: #001e27;
            width: 100%; 
            height: 180px;
            margin-left: -1px;
            margin-top: -5%;
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
  width: 170px;
  margin-top:11px;
  
}
        
.retangulo {
    width: 13rem;
    height: 62.1rem;
    background: #001e27;
    position: absolute;
    top: 170px;
    left: 0;
  }
  .text-cadastro{
color:black;
font-weight: bold;
font-size:26px;
margin-left:1%;
font-weight: 700;
margin-top:-63%;
  }
  
    
        
</style>
</body>
</html>
