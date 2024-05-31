<?php
require 'verificar_permissao.php';

verificarPermissao([1, 2, 3]);

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

    // Calcular o total dos gastos
    $totalGastos = 0;
    foreach ($dados as $dado) {
        $totalGastos += $dado['orcamentos'];
    }
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
            <th>Pagar Faturas</th>
        </tr>
        <?php foreach ($dados as $dado) : ?>
            <tr>
                <td><?php echo htmlspecialchars($dado['id_fiscal']); ?></td>
                <td><?php echo htmlspecialchars($dado['transacoes']); ?></td>
                <td><?php echo htmlspecialchars($dado['fatura']); ?></td>
                <td><?php echo htmlspecialchars($dado['imposto']); ?></td>
                <td><?php echo htmlspecialchars($dado['orcamentos']); ?></td>
                <td><a class="button" href="atualizar_gastos.php?id=<?php echo $dado['id_fiscal']; ?>">Atualizar</a></td>
                <td><a class="button" href="excluir_registro.php?id=<?php echo $dado['id_fiscal']; ?>">Excluir</a></td>
               


            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4"><strong>Total de Gastos:</strong></td>
            <td><strong><?php echo htmlspecialchars(number_format($totalGastos, 2, ',', '.')); ?></strong></td>
            <td colspan="2"></td>
            <td> <a href="#">Gerar Boleto</a>  </td>
        </tr>
    </table>
    <a href="controle_vendas.php"> Ver Vendas </a>
</body>

</html>





<!------------------------------------------------------>








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