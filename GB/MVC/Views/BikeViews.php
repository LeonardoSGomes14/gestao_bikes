
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Bicicleta</title>
</head>
<body>
    <h2>Cadastro de Bicicleta</h2>
    <form action="../Controller/BikeController.php?acao=cadastrar" method="POST" enctype="multipart/form-data">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="ano_fabricado">Ano de Fabricação:</label>
        <input type="text" id="ano_fabricado" name="ano_fabricado" required><br><br>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="tipodoproduto">Tipo de Produto:</label>
        <input type="text" id="tipodoproduto" name="tipodoproduto" required><br><br>


        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
