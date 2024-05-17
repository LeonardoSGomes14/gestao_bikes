<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/solicitacao.css">
    <title>GESTÃO DE BIKES</title>
</head>

<body>

    <div class="comeco">
        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">   
        <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>
        <div class="retangulo"></div> 
        
       
     

        <div class="texto-centralizado ">
            <br>
        <h1 class="div">Lista de Solicitações</h1>
        <a href="../MVC/Views/SolicitacaoViews.php">Criar Nova Solicitação</a>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Solicitante</th>
                        <th>Responsável</th>
                        <th>Situação</th>
                        <th>Criado</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

                // Crie uma conexão com o banco de dados
                $conn = new mysqli($host, $username, $password, $dbname);

                // Verifique a conexão
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Consulte a tabela solicitacao
                $sql = "SELECT id_soli, solicitante, responsavel, situacao, criado FROM solicitacao";
                $result = $conn->query($sql);

                // Verifique se há resultados
                if ($result->num_rows > 0) {
                    // Itere sobre os resultados e crie linhas na tabela
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id_soli']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['solicitante']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['responsavel']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['situacao']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['criado']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhuma solicitação encontrada</td></tr>";
                }

                // Feche a conexão com o banco de dados
                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
</div>
    </div>

</body>
</html>
