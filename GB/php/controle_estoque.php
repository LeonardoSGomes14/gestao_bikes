<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/controlefrota.css">
    <title>Document</title>
</head>
<body>


<div class="comeco">
        <div class="retangulo"></div>
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a> 
    </div>
    
</body>
</html>

<?php
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Consulta SQL para selecionar todos os registros da tabela controleestoque
$sql = "SELECT * FROM controleestoque";

try {
    // Preparar a consulta
    $stmt = $pdo->prepare($sql);

    // Executar a consulta
    $stmt->execute();

    // Verificar se existem registros retornados
    if ($stmt->rowCount() > 0) {
        // Exibir os dados em uma tabela
        echo "<h2>Informações Cadastradas</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Fornecedor</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>";

        // Loop através dos resultados da consulta
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['nomedoproduto'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['preco'] . "</td>";
            echo "<td>" . $row['tipo'] . "</td>";
            echo "<td>" . $row['data'] . "</td>";
            echo "<td>" . $row['fornecedor'] . "</td>";
            
            echo "<td><img src='../MVC/public/Estoque/uploads/{$row['imagem']}' width='100'></td>";
            echo "<td><a href='atualizar_estoque.php?id=" . $row['id_estoque'] . "'>Atualizar</a></td>";
            
         
        }

        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
} catch (PDOException $e) {
    die("Erro ao executar a consulta: " . $e->getMessage());
}

