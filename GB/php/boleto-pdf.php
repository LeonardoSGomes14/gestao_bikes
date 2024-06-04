<?php
require_once "../vendor/autoload.php";
require_once "../config/config.php";
use Dompdf\Dompdf;


$dompdf = new Dompdf();
        
$stmt = $pdo->query("SELECT * FROM controlefiscal");
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Variável para armazenar o conteúdo das tabelas
$tablesContent = '';

// Itera sobre os resultados e cria uma tabela para cada livro
foreach ($usuarios as $usuario) {
    $tableContent = "
        <table>
            
            <tr><td>usuario</td><td>" . $usuario['usuario'] . "</td></tr>
            <tr><td>Email</td><td>" . $usuario['email'] . "</td></tr>
        
        </table>";

    // Adiciona o conteúdo da tabela à variável principal
    $tablesContent .= $tableContent;
}

$dompdf->loadHtml($tablesContent);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>

  