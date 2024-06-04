
<?php
require_once "../vendor/autoload.php";
require_once "../config/config.php";
require 'verificar_permissao.php';

use Dompdf\Dompdf;

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

// Iniciar o Dompdf
$dompdf = new Dompdf();

// Construir o conteúdo HTML para o PDF
$tablesContent = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir Dados Fiscais</title>
    <link rel="stylesheet" href="../Css/controlefiscal.css">
</head>
<body>
<h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
        <table>
        <tr>
            <th>Nome Da Empresa:</th>
            <!-- Adicione mais cabeçalhos conforme necessário -->
        </tr>';

// Recuperar Dados da Tabela cadastro_empresa
try {
    $sql = "SELECT * FROM cadastro_empresa";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $tablesContent .= '<tr><td>' . htmlspecialchars($row['nome']) . '</td></tr>';
        // Adicione mais colunas conforme necessário
    }
} catch (PDOException $e) {
    die("Erro ao recuperar dados da tabela cadastro_empresa: " . $e->getMessage());
}

$tablesContent .= '
        <tr>
            <td colspan="4"><strong>A Pagar:</strong></td>
            <td><strong>' . htmlspecialchars(number_format($totalGastos, 2, ',', '.')) . '</strong></td>
        </tr>
    </table>
    <div class="boleto">
    <div class="boleto-header">
        <div>
            <div class="banco">Nu Pagamentos</div>
        </div>
        <div>
            <div>Faça o seu pagamento pelo nosso aplicativo ou pela loteria federal</div>
            <div>00190.00009 01234.567890 12345.678901 7 89123456789012</div>
        </div>
    </div>
    <div class="barcode">||| |||| ||| ||||| ||||| |||| ||| ||||| ||||| |||| ||| ||||| || |||| ||| ||||| </div>
    <div class="rodape">
    </div>
</body>
<style>
body {
 
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    box-shadow: 0 2px 3px rgba(0,0,0,0.1);
    background-color: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #004080;
    color: #fff;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

.rodape {
    margin-top: 20px;
    text-align: center;
}

.entra {
    display: inline-block;
    padding: 10px 20px;
    background-color: #004080;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.entra:hover {
    background-color: #003366;
}
.boleto {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 2px 3px rgba(0,0,0,0.1);
}

.boleto-header {
    display: flex;
    justify-content: space-between;
    border-bottom: 2px solid #000;
    padding-bottom: 10px;
    margin-bottom: 20px;
}
.banco{
color:purple;

.boleto-header div {
    display: flex;
    align-items: center;
}

.boleto-header img {
    max-height: 50px;
    margin-right: 20px;
}

.boleto-header .banco {
    font-size: 24px;
    font-weight: bold;
}

.boleto-content {
    margin-bottom: 20px;
}

.boleto-content div {
    margin-bottom: 10px;
}

.boleto-content span {
    font-weight: bold;
}

.barcode {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80px;
    background-color: #000;
    color: #fff;
    font-size: 24px;
    letter-spacing: 5px;
    margin: 20px 0;
}


.footer {
    text-align: center;
    margin-top: 20px;
}

.footer a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #004080;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.footer a:hover {
    background-color: #003366;
}
</style>
</html>';

// Carregar o conteúdo HTML no Dompdf
$dompdf->loadHtml($tablesContent);

// (Opcional) Definir o tamanho e a orientação do papel
$dompdf->setPaper('A4', 'landscape');

// Renderizar o HTML como PDF
$dompdf->render();

// Enviar o PDF gerado para o navegador
$dompdf->stream();
?>
