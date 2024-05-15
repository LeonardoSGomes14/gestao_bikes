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

        <div class="retangulo" 
       

        </div>
        <h1 class="titulo"> Sistema De Gestão ERP+controle de empresas e de pessoas </h1>

        <div class="texto-centralizado">
            <h2>Solicitações</h2>
        </div>

        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th>Solicitante</th>
                        <th>Responsável</th>
                        <th>Situação</th>
                        <th>Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Modelo 1</td>
                        <td>Solicitante 1</td>
                        <td>Responsável 1</td>
                        <td>Situação 1</td>
                        <td>2024-05-13</td>
                    </tr>
                    <tr>
                        <td>Modelo 2</td>
                        <td>Solicitante 2</td>
                        <td>Responsável 2</td>
                        <td>Situação 2</td>
                        <td>2024-05-14</td>
                    </tr>
                    <tr>
                        <td>Modelo 3</td>
                        <td>Solicitante 3</td>
                        <td>Responsável 3</td>
                        <td>Situação 3</td>
                        <td>2024-05-15</td>
                    </tr>
                </tbody>
            </table>

            <!DOCTYPE html>
<html>
<head>
    <title>Solicitações</title>
</head>
<body>
    <h1>Lista de Solicitações</h1>
    <a href="../../../MVC/Views/SolicitacaoViews.php">Criar Nova Solicitação</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Solicitante</th>
            <th>Responsável</th>
            <th>Situação</th>
            <th>Criado</th>
        </tr>
        <?php foreach ($solicitacoes as $solicitacao): ?>
            <tr>
                <td><?= htmlspecialchars($solicitacao['id_soli']) ?></td>
                <td><?= htmlspecialchars($solicitacao['solicitante']) ?></td>
                <td><?= htmlspecialchars($solicitacao['responsavel']) ?></td>
                <td><?= htmlspecialchars($solicitacao['situacao']) ?></td>
                <td><?= htmlspecialchars($solicitacao['criado']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

        </div>
    </div>