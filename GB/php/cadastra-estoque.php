<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estoque</title>
</head>
<body>
    <h2>Cadastro de Estoque</h2>
    <form action="processa-cadastro_estoque.php" method="POST" enctype="multipart/form-data">
        <label for="nome_produto">Nome do Produto:</label><br>
        <input type="text" id="nome_produto" name="nome_produto" required><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade" required><br>

        <label for="preco">Preço:</label><br>
        <input type="text" id="preco" name="preco" required><br>

        <label for="tipo">Tipo:</label><br>
        <input type="text" id="tipo" name="tipo" required><br>

        <label for="data">Data:</label><br>
        <input type="date" id="data" name="data" required><br>

        <label for="fornecedor">Fornecedor:</label><br>
        <input type="text" id="fornecedor" name="fornecedor" required><br>

        <label for="imagem">Imagem:</label><br>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
