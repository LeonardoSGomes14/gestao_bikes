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
            <div class="card">
                <div class="info">   
                    <i class='bx bxs-devices'></i>
                    <h1>Cadastros</h1>
                        <a href="../MVC/Views/BikeViews.php">Cadastrar Produtos</a>
                        <a href="cadastrar_empresa.php">Cadastrar Empresas</a>
                        <a href="GB/php/.php">Niveis de Acesso</a>
                        <a href="../php/gestaorh.php">Gestão de RH</a>
                </div>
            </div>
            <div class="card">
                <div class="info">
                    <i class='bx bx-code-alt'></i>

                    <h1>Controles</h1>
                   
                    <a href="../MVC/Views/BikeViews.php">Controle Estoque</a>
                    <a href="cadastrar_empresa.php">Controle Fiscal</a>
                    <a href="cadastra_Cargos.php">Controle Pessoas</a>
                    <a href="cadastrar_empresa.php">Controle Frota</a>
                    <a href="cadastra_Cargos.php">Controle Veiculo</a>
                    
                </div>
            </div>
            <div class="card">
                <div class="info">
                    <i class='bx bxs-component'></i>
                    <h1>informações</h1>
                    
                    <a href="cadastra_Cargos.php">Politica de Privacidade</a>
                    <a href="cadastrar_empresa.php">Página de Contato</a>
                    <a href="../MVC/Views/BikeViews.php">Sobre</a>
                    
                </div>
            </div>
        </div>
        <a class="entra" href="../php/logout.php">Logout</a>
    </section>

    <button class="scroll-top" onclick="scrollToTop()">
        <i class='bx bxs-up-arrow'></i>
    </button>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script src="script.js"></script>
</body>

</html>