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



<!----------------Vendas------------------------------->


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Venda</title>
</head>
<body>
    <h1>Registrar Venda</h1>
    <form action="../public/Fiscal/criar_venda.php" method="post">
        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto" required>
        <br>
        <label for="valor">Valor Unitário:</label>
        <input type="number" step="0.01" id="valor" name="valor" required>
        <br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

<script>
        function calcularCampos() {
            let transacoes = document.getElementById('transacoes').value;
            let fatura = document.getElementById('fatura').value;
            let imposto = document.getElementById('imposto').value;

            // Exemplo de cálculo automático
            if(transacoes && fatura && imposto) {
                let orcamentos = (parseFloat(transacoes) + parseFloat(fatura) + parseFloat(imposto)).toFixed(2);
                document.getElementById('orcamentos').value = orcamentos;
            }
        }
    </script>