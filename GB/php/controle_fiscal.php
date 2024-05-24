<?php
// Configuração do Banco de Dados
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    // Conexão com o Banco de Dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Recuperar Dados da Tabela controlefiscal
try {
    $sql = "SELECT * FROM controlefiscal";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao recuperar dados: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir Dados Fiscais</title>
</head>
<body>
    <h1>Gastos</h1>
    <table>
        <tr>
            <th>ID Fiscal</th>
            <th>Transações</th>
            <th>Fatura</th>
            <th>Imposto</th>
            <th>Gasto Total</th>
            <th>Atualizar</th>
        </tr>
        <?php foreach ($dados as $dado): ?>
        <tr>
            <td><?php echo htmlspecialchars($dado['id_fiscal']); ?></td>
            <td><?php echo htmlspecialchars($dado['transacoes']); ?></td>
            <td><?php echo htmlspecialchars($dado['fatura']); ?></td>
            <td><?php echo htmlspecialchars($dado['imposto']); ?></td>
            <td><?php echo htmlspecialchars($dado['orcamentos']); ?></td>
            <td><a href="atualizar_vendas.php?id=<?php echo $dado['id_fiscal']; ?>">Atualizar</a>
            <a href="deletar_venda.php?id=<?php echo $dado['id_fiscal']; ?>">Excluir</a></td>
            
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>





<!------------------------------------------------------>



<?php
// Configuração de conexão com o banco de dados
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

// Query para selecionar todas as vendas
$sql = "SELECT * FROM vendas";
$stmt = $pdo->query($sql);
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Vendas</title>
</head>
<body>
    <h1>Listar Vendas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Venda</th>
                <th>Produto</th>
                <th>Valor Unitário</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?php echo $venda['id_venda']; ?></td>
                    <td><?php echo $venda['produto']; ?></td>
                    <td><?php echo $venda['valor']; ?></td>
                    <td><?php echo $venda['quantidade']; ?></td>
                    <td><?php echo $venda['total']; ?></td>
                    <td><?php echo $venda['data']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
























    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</body>
</html>
