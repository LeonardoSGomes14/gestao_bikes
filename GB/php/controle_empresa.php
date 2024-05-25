<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/controlefrota.css">
    <title>Document</title>
</head>
<body>
    <style>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        font-family: Arial, sans-serif;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .actions {
        display: flex;
        justify-content: space-between;
    }
</style>

        </style>

    
<div class="comeco">
        <div class="retangulo"></div>
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a> 
    </div>
      
</body>
</html>

<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

// Exibir empresas cadastradas
echo "<h2>Controle De Empresas</h2>";
echo "<table>";
echo "<tr><th>Nome</th><th>Serviços</th><th>CNPJ</th><th>CEP</th><th>Estado</th><th>Rua</th><th>Número</th><th>Ações</th></tr>";

try {
    $stmt = $pdo->query("SELECT * FROM cadastro_empresa");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['servicos']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cnpj']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cep']) . "</td>";
        echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
        echo "<td>" . htmlspecialchars($row['rua']) . "</td>";
        echo "<td>" . htmlspecialchars($row['numero']) . "</td>";
        echo "<td>";
        echo "<a href='editar_empresa.php?id=" . htmlspecialchars($row['id_empresa']) . "'>Editar</a> | ";
        echo "<a href='deletar_empresa.php?id=" . htmlspecialchars($row['id_empresa']) . "' onclick='return confirm(\"Tem certeza que deseja deletar esta empresa?\")'>Deletar</a>";
        echo "</td>";
        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "<p>Erro ao exibir empresas: " . $e->getMessage() . "</p>";
}

echo "</table>";
?>