

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/gestaorh.css">
  <title>Document</title>
</head>

<div class="comeco">
  <div class="quadrado-cheio"></div>

  <div class="texto-centralizado">
    Solicitações
  </div>


  <div class="search-container">
    <input type="text" placeholder="Pesquisar...">
    <button type="submit">Pesquisar</button>
  </div>


  <div class="container">
    <div class="row header">
      <div class="column">Modelo</div>
      <div class="column">Solicitante</div>
      <div class="column">Responsável</div>
      <div class="column">Situação</div>
      <div class="column">Criado em</div>
    </div>
    <div class="row">
      <div class="column">Tarefa 1</div>
      <div class="column">João</div>
      <div class="column">Maria</div>
      <div class="column">Em progresso</div>
      <div class="column">2024-04-30</div>
    </div>
    <div class="row">
      <div class="column">Tarefa 2</div>
      <div class="column">Carlos</div>
      <div class="column">Ana</div>
      <div class="column">Concluído</div>
      <div class="column">2024-04-29</div>
    </div>

  </div>



  <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>


  <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">

  <div id="menu">
    <div id="menu-bar" onclick="menuOnClick()">
      <div id="bar1" class="bar"></div>
      <div id="bar2" class="bar"></div>
      <div id="bar3" class="bar"></div>
    </div>
    <nav class="nav" id="nav">
      <ul>
        <img src="../Img/Image 2024-04-17 at 08.04.01.jpeg" style="border-radius: 50%;" width="135px" height="120px">
        <a href="#" class="confirm-link" onclick="confirmLogout()">

        <a href="#" class="confirm-link" onclick="confirmLogout()">   
<?php

session_start();

if (!isset($_SESSION["usuario"])) {
    echo '<a class="conect" href="login.php">Conecte-se</a>';
} else {
    echo '<h1 class="conect">Olá, ' . $_SESSION["usuario"] . '</h1>';
}
?>
        </a>
        <li><a href="#">Home</a></li>
        <li><a href="#">Solicitações</a></li>
        <li><a href="#">Recibo</a></li>


      </ul>
    </nav>
  </div>

  <div class="menu-bg" id="menu-bg"></div>

  <script>
    function menuOnClick() {
      document.getElementById("menu-bar").classList.toggle("change");
      document.getElementById("nav").classList.toggle("change");
      document.getElementById("menu-bg").classList.toggle("change-bg");
    }
  </script>