<?php
session_start(); // Certifique-se de iniciar a sessão em todas as páginas que usam sessões


include_once('../config/config.php');
include_once('../MVC/Controller/UserController.php');
include_once('../MVC/Model/UserModel.php');


$userController = new userController($pdo);

//exibir user

if (isset($_POST['exibir_user'])) {
  $userController->exibirListausers();
}

$users = $userController->listarusers();


$userController = new userController($pdo);
$users = $userController->listarUsers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/gestaorh.css">
  <title>Document</title>
</head>

<div class="comeco">

</div>
</div>
<div class="quadrado-cheio"></div>

<div class="texto-centralizado">
  <h1> Gerenciamento de usuários </h1>
</div>


<?php
$userController->exibirListausers();
?>

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