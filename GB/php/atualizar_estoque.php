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
            echo "<form method='POST' action='atualizar_produto.php' enctype='multipart/form-data'>";
            echo "<td><input type='text' name='nomedoproduto' value='" . $row['nomedoproduto'] . "'></td>";
            echo "<td><input type='number' name='quantidade' value='" . $row['quantidade'] . "'></td>";
            echo "<td><input type='text' name='preco' value='" . $row['preco'] . "'></td>";
            echo "<td><input type='text' name='tipo' value='" . $row['tipo'] . "'></td>";
            echo "<td><input type='date' name='data' value='" . $row['data'] . "'></td>";
            echo "<td><input type='text' name='fornecedor' value='" . $row['fornecedor'] . "'></td>";
            echo "<td><img src='../MVC/public/Estoque/uploads/{$row['imagem']}' width='100'><br><input type='file' name='imagem'></td>";
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
?>
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_estoque = $_POST['id_estoque'];
    $nomedoproduto = $_POST['nomedoproduto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $fornecedor = $_POST['fornecedor'];
    $imagem_atual = $_POST['imagem_atual'];

    // Verificar se uma nova imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $imagem = basename($_FILES['imagem']['name']);
        $upload_dir = '../MVC/public/Estoque/uploads/';
        $upload_file = $upload_dir . $imagem;

        // Mover o arquivo enviado para o diretório de uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $upload_file)) {
            // Se o upload da nova imagem for bem-sucedido, atualizar a imagem no banco de dados
            $imagem_final = $imagem;
        } else {
            // Caso contrário, usar a imagem atual
            $imagem_final = $imagem_atual;
        }
    } else {
        // Se nenhuma nova imagem for enviada, usar a imagem atual
        $imagem_final = $imagem_atual;
    }

    // Consulta SQL para atualizar o registro
    $sql = "UPDATE controleestoque 
            SET nomedoproduto = :nomedoproduto, 
                quantidade = :quantidade, 
                preco = :preco, 
                tipo = :tipo, 
                data = :data, 
                fornecedor = :fornecedor, 
                imagem = :imagem 
            WHERE id_estoque = :id_estoque";

    try {
        // Preparar a consulta
        $stmt = $pdo->prepare($sql);

        // Executar a consulta
        $stmt->execute([
            ':nomedoproduto' => $nomedoproduto,
            ':quantidade' => $quantidade,
            ':preco' => $preco,
            ':tipo' => $tipo,
            ':data' => $data,
            ':fornecedor' => $fornecedor,
            ':imagem' => $imagem_final,
            ':id_estoque' => $id_estoque
        ]);

        echo "Registro atualizado com sucesso. <a href='index.php'>Voltar</a>";
    } catch (PDOException $e) {
        die("Erro ao atualizar o registro: " . $e->getMessage());
    }
} else {
    echo "Método de solicitação inválido.";
}
?>
