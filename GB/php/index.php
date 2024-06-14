<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/index.css">
    <title>Página Inicial</title>
</head>

<body>

    <style>
        #loading-screen {
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            margin: 0;
        }

        .spinner {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite, color-change 3s infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes color-change {
            0% {
                border-top-color: #3498db;
            }

            25% {
                border-top-color: #e74c3c;
            }

            50% {
                border-top-color: #f1c40f;
            }

            75% {
                border-top-color: #2ecc71;
            }

            100% {
                border-top-color: #3498db;
            }
        }

        .loading-text {
            margin-top: 20px;
            font-size: 24px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: color-text-change 3s infinite;
        }

        @keyframes color-text-change {
            0% {
                color: #3498db;
            }

            25% {
                color: #e74c3c;
            }

            50% {
                color: #f1c40f;
            }

            75% {
                color: #2ecc71;
            }

            100% {
                color: #3498db;
            }
        }

        #content {
            display: none;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            margin: 20px 0;
        }

        p {
            font-size: 24px;
        }
    </style>

    <div id="loading-screen">
        <div class="spinner"></div>
        <div class="loading-text">Loading...</div>
    </div>

    <script src="../JS/script.js"></script>

    <section class="comeco">
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <div class="dois">
        <a class="entra" href="tutorial_pdf.php">Baixar Tutorial PDF </a>
            <a class="conhecer" href="tutorial.php">Tutorial em vídeo</a>
            <a class="entra" href="login_empresa.php">Entrar</a>
        </div>
    </section>

    <main>
        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">
        <div class="bannerall">
        <img class="banner1" src="../Img/bannerr1.jpeg">
        <img class="banner2" src="../Img/banner2.jpeg"></div>
    </main>

    <footer class="container">
    <div>
         
        </div>
        <div class="column">
            <h4>Sobre nós</h4>
            <a href="../php/sobre.php">Sobre</a>    
        </div>
        <div class="column">
            <h4>Contato</h4>
            <a href="../php/contato.php">Página de Contato</a> <br><br>
            <a href="../php/politica.php">Politica de Privacidade</a>
        </div>

        <div class="icons">
            <a href="https://www.facebook.com/" target="_blank">
                <img class="face" src="../Img/facebook-logo.png" width="30"></a>
            <a href="https://twitter.com/login?lang=pt" target="_blank">
                <img class="face" src="../Img/x-logo.png" width="34"></a>
            <a href="https://www.youtube.com/" target="_blank">
                <img class="face" src="../Img/youtube-logo.png" width="30"></a>
            <a href="https://br.pinterest.com/" target="_blank">
                <img class="face" src="../Img/pinterest-logo.png" width="30"></a>
            <a href="https://www.instagram.com/" target="_blank">
                <img class="face" src="../Img/instagram-logo.png" width="30"></a>
            <a href="https://www.tiktok.com/pt-BR/" target="_blank">
                <img class="face" src="../Img/tiktok-logo.png" width="30"></a>
        </div>
        <h3>@ 2024 Copyright Bitrixx</h3>

    </footer>

</body>

</html>