<?php
// index.php

// Inclui o arquivo do controlador
require_once '../Controller/EstoqueController.php';

// Cria uma instância do controlador
$controller = new EstoqueController();

// Chama o método para exibir o formulário de cadastro de produtos
$controller->exibirFormularioCadastro();
?>

<!-- EstoqueViews.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <!-- Formulário de cadastro de produto -->
    <form action="index.php?action=cadastrar" method="post" enctype="multipart/form-data">
        <!-- Campos do formulário -->
        Nome do Produto: <input type="text" name="nomeProduto"><br>
        Quantidade: <input type="text" name="quantidade"><br>
        Preço: <input type="text" name="preco"><br>
        Tipo: <input type="text" name="tipo"><br>
        Data: <input type="date" name="data"><br>
        Fornecedor: <input type="text" name="fornecedor"><br>
        Imagem: <input type="file" name="imagem"><br>
        <!-- Botão de envio -->
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
