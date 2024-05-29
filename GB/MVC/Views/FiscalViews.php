<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Fiscal</title>
    
</head>
<body>
<h1>Fatura</h1>
    <form method="post" action="../Controller/FiscalController.php" oninput="calcularCampos()">
        <label for="transacoes">Transações:</label>
        <input type="text" id="transacoes" name="transacoes" required><br>

        <label for="fatura">Fatura:</label>
        <input type="text" id="fatura" name="fatura" required><br>

        <label for="imposto">Imposto:</label>
        <input type="text" id="imposto" name="imposto" required><br>

        <label for="orcamentos">Gasto Total:</label>
        <input type="text" id="orcamentos" name="orcamentos" required readonly><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

