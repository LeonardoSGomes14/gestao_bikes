<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir a Solicitação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            color: #ff0000;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <?php
    // Conexão com o banco de dados
    $host = 'localhost';
    $dbname = 'bike';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Coleta os dados do formulário
            if (isset($_POST['solicitante']) && isset($_POST['responsavel']) && isset($_POST['pedido']) && isset($_POST['situacao'])) {
                $solicitante = $_POST['solicitante'];
                $responsavel = $_POST['responsavel'];
                $pedido = $_POST['pedido'];
                $situacao = $_POST['situacao'];
                $criado = date('Y-m-d');

                // Prepara e executa a inserção no banco de dados
                $stmt = $pdo->prepare("INSERT INTO solicitacao (solicitante, responsavel, pedido, situacao, criado) VALUES (:solicitante, :responsavel, :pedido, :situacao, :criado)");
                $stmt->execute(array(
                    ':solicitante' => $solicitante,
                    ':responsavel' => $responsavel,
                    ':pedido' => $pedido,
                    ':situacao' => $situacao,
                    ':criado' => $criado
                ));
                
                // Feedback para o usuário
                echo "<p class='message'>Solicitação cadastrada com sucesso!</p>";
            } else {
                echo "<p class='message'>Por favor, preencha todos os campos.</p>";
            }
        }

        // Verifica se a solicitação de exclusão foi feita
        if (isset($_GET['delete']) && !empty($_GET['delete'])) {
            $idToDelete = $_GET['delete'];
            $stmt = $pdo->prepare("DELETE FROM solicitacao WHERE id_soli = ?");
            $stmt->execute([$idToDelete]);

            // Verifica se a exclusão foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                echo "<p class='message'>Solicitação excluída com sucesso!</p>";
            } else {
                echo "<p class='message'>Erro ao excluir a solicitação.</p>";
            }
        }
    } catch (PDOException $e) {
        die("Erro ao conectar: " . $e->getMessage());
    }
    ?>

    <!-- Exibição das solicitações cadastradas -->
    <h2>Solicitações Cadastradas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Solicitante</th>
            <th>Responsável</th>
            <th>Pedido</th>
            <th>Situação</th>
            <th>Criado</th>
            <th>Ações</th>
        </tr>
        <?php
        // Consulta as solicitações cadastradas
        $stmt = $pdo->query("SELECT * FROM solicitacao");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id_soli']."</td>";
            echo "<td>".$row['solicitante']."</td>";
            echo "<td>".$row['responsavel']."</td>";
            echo "<td>".$row['pedido']."</td>";
            echo "<td>".$row['situacao']."</td>";
            echo "<td>".$row['criado']."</td>";
            echo "<td><a href='?delete=".$row['id_soli']."'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>