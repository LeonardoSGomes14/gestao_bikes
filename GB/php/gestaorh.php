
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/gestaorh.css">
    <title>Document</title>
</head>
<div class="comeco">
        
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
<?php


echo "<h1 class='welcome-message'>Olá, " . $_SESSION["usuario"] . "</h1>";
?>
</a>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#">Blog</a></li>
      
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
  <script>
function confirmLogout() {
    var confirmLogout = confirm("Você realmente deseja sair da sua conta?");
    if (confirmLogout) {
        window.location.href = 'logout.php';
    }
}
</script>   