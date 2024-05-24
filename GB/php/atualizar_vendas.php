<?php
// Verificar se todas as informações necessárias foram passadas pela URL
if (isset($_GET['id']) && isset($_GET['produto']) && isset($_GET['valor']) && isset($_GET['quantidade']) && isset($_GET['total']) && isset($_GET['data'])) {
    // Extrair as informações da URL
    $id_venda = $_GET['id'];
    $produto = $_GET['produto'];
    $valor = $_GET['valor'];
    $quantidade = $_GET['quantidade'];
    $total = $_GET['total'];
    $data = $_GET['data'];

    // Exibir as informações da venda
    echo "<h2>Atualizar Venda</h2>";
    echo "<form action='atualizar_venda_processamento.php' method='POST'>";
    echo "<input type='hidden' name='id_venda' value='$id_venda'>";
    echo "<label for='produto'>Produto:</label>";
    echo "<input type='text' name='produto' value='$produto'><br>";
    echo "<label for='valor'>Valor Unitário:</label>";
    echo "<input type='text' name='valor' value='$valor'><br>";
    echo "<label for='quantidade'>Quantidade:</label>";
    echo "<input type='text' name='quantidade' value='$quantidade'><br>";
    echo "<label for='total'>Total:</label>";
    echo "<input type='' name='total' value='$total'><br>";
    echo "<label for='data'>Data:</label>";
    echo "<input type='text' name='data' value='$data'><br>";
    echo "<input type='submit' value='Atualizar'>";
    echo "</form>";
} else {
    echo "Informações da venda não especificadas.";
}
?>
