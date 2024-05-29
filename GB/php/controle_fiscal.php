<?php
require 'verificar_permissao.php';

verificarPermissao([1,2,3]);
 
?>

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
<link rel="stylesheet" href="../Css/controlefiscal.css">

<head>
    <meta charset="UTF-8">
    <title>Exibir Dados Fiscais</title>
</head>

<body>

    <div class="comeco">
        <div class="retangulo"></div>
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a>
    </div>

    <h1>Gastos</h1>
    <table>
        <tr>
            <th>ID Fiscal</th>
            <th>Transações</th>
            <th>Fatura</th>
            <th>Imposto</th>
            <th>Gasto Total</th>
            <th>Atualizar</th>
            <th>Excluir</th>
        </tr>
        <?php foreach ($dados as $dado) : ?>
            <tr>
                <td><?php echo htmlspecialchars($dado['id_fiscal']); ?></td>
                <td><?php echo htmlspecialchars($dado['transacoes']); ?></td>
                <td><?php echo htmlspecialchars($dado['fatura']); ?></td>
                <td><?php echo htmlspecialchars($dado['imposto']); ?></td>
                <td><?php echo htmlspecialchars($dado['orcamentos']); ?></td>
                <td><a class="button" href="atualizar_vendas.php?id=<?php echo $dado['id_fiscal']; ?>">Atualizar</a></td>
                <td><a class="button" href="deletar_venda.php?id=<?php echo $dado['id_fiscal']; ?>">Excluir</a></td>


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
                <th>Atualizar</th>
                <th>Deletar</th> <!-- Coluna adicional para o botão de atualizar -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda) : ?>
                <tr>
                    <td><?php echo $venda['id_venda']; ?></td>
                    <td><?php echo $venda['produto']; ?></td>
                    <td><?php echo $venda['valor']; ?></td>
                    <td><?php echo $venda['quantidade']; ?></td>
                    <td><?php echo $venda['total']; ?></td>
                    <td><?php echo $venda['data']; ?></td>
                    
                    <td><a class="button" href="atualizar_vendas.php?id=<?php echo $venda['id_venda']; ?>&produto=<?php echo $venda['produto']; ?>&valor=<?php echo $venda['valor']; ?>&quantidade=<?php echo $venda['quantidade']; ?>&total=<?php echo $venda['total']; ?>&data=<?php echo $venda['data']; ?>">Atualizar</a></td>
                    <td><a class="button" href="deletar_venda.php?id=<?php echo $venda['id_venda']; ?>">Deletar</a></td>

                    </td>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>






    <a class="entra" href="../Portifolio/index.php">Voltar</a>

</body>

</html>








<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 5px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color:#001e27;
        color: #ddd;
    }
</style>
</body>

</html>