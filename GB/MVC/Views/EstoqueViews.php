<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="../../Css/estoque.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            margin-top: 205px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
        }
        input[type="submit"]:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }
        input[type="submit"]:active {
            transform: translateY(1px);
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
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            font-family: Arial, Helvetica, sans-serif;
        }
        .entra:hover {
            transform: scale(1.1);
        }
        .comeco {
            background-color: #001e27;
            width: 100%;
            height: 180px;
            margin-left: -1px;
            margin-top: -5%;
            position: absolute;
        }
        .titulo {
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            position: absolute;
            left: 370px;
            top: 30px;
        }
        .logo {
            position: absolute;
            width: 170px;
            margin-top: 11px;
        }
        .retangulo {
            width: 13rem;
            height: 62.1rem;
            background: #001e27;
            position: absolute;
            top: 170px;
            left: 0;
        }
        .text-cadastro {
            color: black;
            font-weight: bold;
            font-size: 26px;
            margin-left: 1%;
            font-weight: 700;
            margin-top: -63%;
        }
        .form-container input[type="submit"] {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            text-transform: uppercase;
        }
        .form-container input[type="submit"]:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }
        .form-container input[type="submit"]:active {
            transform: translateY(1px);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }
        table th,
        table td {
            padding: 12px 15px;
        }
        table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>
<body>
    <div class="retangulo"></div>
    <div class="comeco">
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <img class="logo" src="../../Img/bitrix-removebg-preview.png" width="300px">
    </div>
    <div class="sidebar">
        <button onclick="window.location.href='../../portifolio/index.php'">Home</button>
        <button onclick="window.location.href='../../php/controle_estoque.php'">Produtos Cadastrados</button>
    </div>
    <div class="container">
        <div class="form-container">
            <form action="../public/Estoque/Resultado.php" method="POST" enctype="multipart/form-data">
                <label for="nome_produto">Nome do Produto:</label>
                <input type="text" id="nome_produto" name="nome_produto" required>
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" required>
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" required>
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
                <label for="fornecedor">Fornecedor:</label>
                <input type="text" id="fornecedor" name="fornecedor" required>
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*" required>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
    <div class="text-cadastro">Cadastro de Produtos</div>
    <table>
        <thead>
            <tr>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Fornecedor</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            <tr class="active-row">
                <td>Produto 1</td>
                <td>100</td>
                <td>R$ 50,00</td>
                <td>Tipo A</td>
                <td>2024-05-24</td>
                <td>Fornecedor A</td>
                <td>imagem.jpg</td>
            </tr>
            <tr>
                <td>Produto 2</td>
                <td>200</td>
                <td>R$ 150,00</td>
                <td>Tipo B</td>
                <td>2024-05-24</td>
                <td>Fornecedor B</td>
                <td>imagem2.jpg</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
