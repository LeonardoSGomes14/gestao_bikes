<?php

require_once '../config/config.php';
require_once '../MVC/Controller/EmpresaController.php';
require_once '../MVC/Model/EmpresaModel.php';


if (isset($_POST['cnpj']) && isset($_POST['senha_emp'])) {
    $cnpj = $_POST['cnpj'];
    $senha_emp = $_POST['senha_emp'];

    $sql_code = $pdo->prepare("SELECT * FROM cadastro_empresa WHERE cnpj = ? AND senha_emp = ?");
    $sql_code->execute([$cnpj, $senha_emp]);

    $quantidade = $sql_code->rowCount();



    if ($quantidade > 0) {
        $pdo = $sql_code->fetch(PDO::FETCH_ASSOC);


        $_SESSION['id_empresa'] = $pdo['id_empresa'];
        $_SESSION['nome'] = $pdo['nome'];
        $_SESSION['cnpj'] = $pdo['cnpj'];

        header('Location: ../php/login.php');
    } else {
        echo '
            <script>
                function verificarCondicao() {
                    var condicao = true;
                    if (condicao) {
                        exibirCaixaDialogo();
                    }
                }
                function exibirCaixaDialogo() {
                    var resposta = confirm("Algumas credenciais estão incorretas, tente novamente!");
                    if (resposta == true) {
                    
                    } else {
                }
            }
                window.onload = verificarCondicao;
            </script>
        ';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../Css/cadastro_empresa.css">
</head>

<body>
    <div class="comeco">
        <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
        <a href="index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" ></a>
    </div>
    <section>
            <div class="sidebar">
                <button><a class="conect" href="politica.php">Politica de Privacidade</a></button>
                <button><a class="conect" href="contato.php">Página de Contato</a></button>
                <button><a class="conect" href="sobre.php">Sobre</a></button>
            </div>

        
        <div class="center_form ">
<h1>Login de empresa</h1>
        <form method="post">

            <label for="cnpj">CNPJ:</label><br>
            <input type="text" id="cnpj" name="cnpj" required><br>

            <label for="nome">Senha:</label><br>
            <input type="password" id="senha_emp" name="senha_emp" required><br>

            <button type="submit" name="signin"> Entrar </button>

            <p> Sua empresa ainda não tem conta? Realize o <a href="cadastrar_empresa_ft.php"> Cadastro </a></p>
        </form>

        </div>
    </section>

</body>

</html>