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
            echo "<form method='POST' action='atualizar_estoque.php' enctype='multipart/form-data'>";
            echo "<td><input type='text' name='nomedoproduto' value='" . $row['nomedoproduto'] . "'></td>";
            echo "<td><input type='number' name='quantidade' value='" . $row['quantidade'] . "'></td>";
            echo "<td><input type='text' name='preco' value='" . $row['preco'] . "'></td>";
            echo "<td><input type='text' name='tipo' value='" . $row['tipo'] . "'></td>";
            echo "<td><input type='date' name='data' value='" . $row['data'] . "'></td>";
            echo "<td><input type='text' name='fornecedor' value='" . $row['fornecedor'] . "'></td>";
            echo "<td><input type='file' name='imagem'></td>";
            echo "<td>
                    <input type='hidden' name='id_estoque' value='" . $row['id_estoque'] . "'>
                    <input type='hidden' name='imagem_atual' value='" . $row['imagem'] . "'>
                    <input type='submit' value='Atualizar'>
                  </td>";
            echo "</form>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum registro encontrado.";
    }
} catch (PDOException $e) {
    die("Erro ao executar a consulta: " . $e->getMessage());
}

