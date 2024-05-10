

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>

    <h2>Cadastro de Produto</h2>
    <form action="../public/Estoque/Resultado.php" method="POST" enctype="multipart/form-data">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="fornecedor">Fornecedor:</label>
        <input type="text" id="fornecedor" name="fornecedor" required><br><br>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
