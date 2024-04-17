<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/index.css">
    <title>Document</title>
</head>

<body>

    <div class="comeco">
        
            <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>

            <!---Menu----->
            <div class="dois">
                <a class="conhecer" href="conhecer.php">Quero Conhecer</a>

            
                <?php

session_start(); 
// Verifica se o usuário está logado
if(isset($_SESSION['nome_usuario'])) {
    $nome_usuario = $_SESSION['nome_usuario'];
    echo '<a class="entra" href="perfil.php">' . $nome_usuario . '</a>'; 
} else {
    echo '<a class="entra" href="login.php">Entrar</a>';
}
?>
            </div>
            </div>
        <!---Fim---->
    
    <main>
        <!-----------------LOGO----------------->

        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">



        <img class="banner1" src="../Img/bannerr1.jpeg">
        <img class="banner2" src="../Img/banner2.jpeg">
 
    </main>

    <footer>


    </footer>
</body>

</html>