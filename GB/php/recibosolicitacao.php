<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/recibosolicitacao.css">
    <title>GESTÃO DE BIKES</title>
</head>

<body>
    <div class="comeco">
        <div class="retangulo"></div>
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a> 
    </div>

    <div class="sidebar">
    <button onclick="window.location.href='../Portifolio/index.php'">Home</button>
        <button onclick="window.location.href='../MVC/public/Solicitacao/index.php'">Solicitações</button>
        <button onclick="window.location.href='../php/recibosolicitacao.php'">Recibo</button>
    </div>

    <div class="main-content">
        <div class="table-container">
            <h2>Recibo de Solicitação</h2>
            <table>
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Responsável</th>
                        <th>Situação</th>
                        <th>Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Exemplo de array de dados
                    $solicitacoes = [
                        ['modelo' => 'Modelo A', 'responsavel' => 'João', 'situacao' => 'Atendido', 'criado_em' => '2024-01-15'],
                        ['modelo' => 'Modelo B', 'responsavel' => 'Maria', 'situacao' => 'Pendente', 'criado_em' => '2024-02-20'],
                        ['modelo' => 'Modelo C', 'responsavel' => 'Pedro', 'situacao' => 'Atendido', 'criado_em' => '2024-03-10'],
                    ];

                    // Iterar sobre o array e criar linhas da tabela
                    foreach ($solicitacoes as $solicitacao) {
                        echo "<tr>";
                        echo "<td>{$solicitacao['modelo']}</td>";
                        echo "<td>{$solicitacao['responsavel']}</td>";
                        echo "<td>{$solicitacao['situacao']}</td>";
                        echo "<td>{$solicitacao['criado_em']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
