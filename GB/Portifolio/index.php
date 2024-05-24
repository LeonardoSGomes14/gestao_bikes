<?php

include_once '../php/access_filter.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Gestão de Empresa</title>
</head>

<body>

    <header>
        
        <div id="particles"></div>
        <div class="info-text">
            <h1>Bem vindo!</h1>
            <h3> Sistema de Gestão Online</h3>
            <a href="#about" class="scroll"><i class='bx bxs-down-arrow'></i></a>
        </div>
    </header>

    <section id="about">
        <div class="header">
            <h1>Feedback</h1>
        </div>

        <div class="card">
            <img src="assets/logo.png">
            <div class="info">
                <h1>Bolsonaro</h1>
                <p>
                    "Parabéns pelo seu site! Fiquei impressionado com a qualidade do design e a facilidade de navegação.
                    A organização do conteúdo é excelente e realmente cativante. Além disso, gostei muito da forma como
                    você apresenta suas informações de forma clara e concisa"
                </p>

            </div>
        </div>
    </section>

    <section id="features">
        <div class="header">
            <h1>Acessos</h1>
      
        </div>
        <div class="feature-cards">
        
        </div>
        <?php
session_start();

include_once('../config/config.php');
include_once('../MVC/Controller/UserController.php');
require_once('../MVC/Model/UserModel.php');

if (isset($_POST['submit'])) {
    // Processo de cadastro aqui
} elseif (isset($_POST['signin'])) {
    // Processo de login aqui
}

// Verifica se o usuário está logado
if (isset($_SESSION["id_user"])) {
    echo '<h1 class="conect">Olá, ' . $_SESSION["nome_usuario"] . '</h1>';
} else {
    echo '<a class="conect" href="../php/login.php">Conecte-se</a>';
}
?>

    </section>

    <button class="scroll-top" onclick="scrollToTop()">
        <i class='bx bxs-up-arrow'></i>
    </button>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script src="script.js"></script>
</body>

</html>