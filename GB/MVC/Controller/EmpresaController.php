<?php
require_once '/MVC/Model/EmpresaModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = new Empresa();
    $empresa->nome = $_POST['nome'];
    $empresa->servicos = $_POST['servicos'];
    $empresa->cnpj = $_POST['cnpj'];
    $empresa->cep = $_POST['cep'];
    $empresa->estado = $_POST['estado'];
    $empresa->rua = $_POST['rua'];
    $empresa->numero = $_POST['numero'];

    $empresa->cadastrar();
}

    
header("Location: ../MVC/Views/EmpresaViews.php");
exit();
?>
