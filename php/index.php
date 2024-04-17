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
                <a class="entra" href="login.php">Entrar</a>
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











<script>
        document.addEventListener("DOMContentLoaded", function() {
            var video = document.getElementById("background-video");

            video.addEventListener("ended", function() {
                // Aguarda 10 segundos antes de reiniciar o vídeo
                setTimeout(function() {
                    video.currentTime = 0;
                    video.play();
                }, 90000); // 10000 milissegundos = 10 segundos
            });
        });
    </script>
        <script>
        window.addEventListener("scroll", function() {
            var rolt = document.getElementById("initial-rolt");
            if (window.scrollY > 0) {
                rolt.id = "fixed-rolt";
            } else {
                rolt.id = "initial-rolt";
            }
        });
    </script>
