<?php
    require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $servicos = $_POST['servicos'];
        $cnpj = $_POST['cnpj'];
        $cep = $_POST['cep'];
        $estado = $_POST['estado'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];

        try {
            $stmt = $pdo->prepare("INSERT INTO cadastro_empresa (nome, servicos, cnpj, cep, estado, rua, numero) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $servicos, $cnpj, $cep, $estado, $rua, $numero]);
            echo "<p>Empresa cadastrada com sucesso!</p>";
        } catch (PDOException $e) {
            echo "<p>Erro ao cadastrar empresa: " . $e->getMessage() . "</p>";
        }
    }

    // Exibir empresas cadastradas
    echo "<h2>Empresas Cadastradas</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th><th>Serviços</th><th>CNPJ</th><th>CEP</th><th>Estado</th><th>Rua</th><th>Número</th></tr>";

    try {
        $stmt = $pdo->query("SELECT * FROM cadastro_empresa");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($row['servicos']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cnpj']) . "</td>";
            echo "<td>" . htmlspecialchars($row['cep']) . "</td>";
            echo "<td>" . htmlspecialchars($row['estado']) . "</td>";
            echo "<td>" . htmlspecialchars($row['rua']) . "</td>";
            echo "<td>" . htmlspecialchars($row['numero']) . "</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao exibir empresas: " . $e->getMessage() . "</p>";
    }

    echo "</table>";
    ?>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff;
}

form {
    max-width: 600px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

table th {
    background-color: #007bff;
    color: #ffffff;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #e2e6ea;
}

        </style>
</body>