<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bike";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para adicionar veículo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_vehicle'])) {
    $marca = $_POST['marca'];
    $ano_fabricado = $_POST['ano_fabricado'];
    $modelo = $_POST['modelo'];
    $tipodoproduto = $_POST['tipodoproduto'];
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));

    $sql = "INSERT INTO frota (marca, ano_fabricado, modelo, tipodoproduto, imagem)
            VALUES ('$marca', '$ano_fabricado', '$modelo', '$tipodoproduto', '$imagem')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo veículo adicionado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Função para atualizar veículo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_vehicle'])) {
    $id_frota = $_POST['id_frota'];
    $marca = $_POST['marca'];
    $ano_fabricado = $_POST['ano_fabricado'];
    $modelo = $_POST['modelo'];
    $tipodoproduto = $_POST['tipodoproduto'];
    $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));

    $sql = "UPDATE frota SET marca='$marca', ano_fabricado='$ano_fabricado', modelo='$modelo', tipodoproduto='$tipodoproduto', imagem='$imagem' WHERE id_frota=$id_frota";

    if ($conn->query($sql) === TRUE) {
        echo "Veículo atualizado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Função para deletar veículo
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_vehicle'])) {
    $id_frota = $_GET['id_frota'];

    $sql = "DELETE FROM frota WHERE id_frota=$id_frota";

    if ($conn->query($sql) === TRUE) {
        echo "Veículo deletado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Função para pegar dados do veículo a ser editado
$vehicle_to_edit = null;
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit_vehicle'])) {
    $id_frota = $_GET['id_frota'];
    $sql = "SELECT * FROM frota WHERE id_frota=$id_frota";
    $result = $conn->query($sql);
    $vehicle_to_edit = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/controlefrota.css">
    <title>GESTÃO DE BIKES</title>
</head>

<body>
    <div class="comeco">
        <div class="retangulo"></div>
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
        <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">
    </div>

  

    <div class="content">
        <div class="container">
            <h1>Controle de Frota</h1>
            <div class="form-veiculos-container">
                <div class="form-container">
                    <h2>Adicionar Veículo</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="add_vehicle" value="1">
                        <label for="marca">Marca:</label>
                        <input type="text" id="marca" name="marca" required><br>
                        <label for="ano_fabricado">Ano Fabricado:</label>
                        <input type="text" id="ano_fabricado" name="ano_fabricado" required><br>
                        <label for="modelo">Modelo:</label>
                        <input type="text" id="modelo" name="modelo" required><br>
                        <label for="tipodoproduto">Tipo do Produto:</label>
                        <input type="text" id="tipodoproduto" name="tipodoproduto" required><br>
                        <label for="imagem">Imagem:</label>
                        <input type="file" id="imagem" name="imagem" required><br>
                        <input type="submit" value="Adicionar Veículo">
                    </form>

                    <?php if ($vehicle_to_edit): ?>
                        <h2>Editar Veículo</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edit_vehicle" value="1">
                            <input type="hidden" name="id_frota" value="<?php echo $vehicle_to_edit['id_frota']; ?>">
                            <label for="marca">Marca:</label>
                            <input type="text" id="marca" name="marca" value="<?php echo $vehicle_to_edit['marca']; ?>" required><br>
                            <label for="ano_fabricado">Ano Fabricado:</label>
                            <input type="text" id="ano_fabricado" name="ano_fabricado" value="<?php echo $vehicle_to_edit['ano_fabricado']; ?>" required><br>
                            <label for="modelo">Modelo:</label>
                            <input type="text" id="modelo" name="modelo" value="<?php echo $vehicle_to_edit['modelo']; ?>" required><br>
                            <label for="tipodoproduto">Tipo do Produto:</label>
                            <input type="text" id="tipodoproduto" name="tipodoproduto" value="<?php echo $vehicle_to_edit['tipodoproduto']; ?>" required><br>
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem" required><br>
                            <input type="submit" value="Atualizar Veículo">
                        </form>
                    <?php endif; ?>
                </div>

                <div class="veiculos-container">
                    <h2>Veículos na Frota</h2>
                    <?php
                    $sql = "SELECT * FROM controlefrota";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='veiculo'>";
                            echo "<div class='info'>";
                            echo "<p>ID: " . $row["id_frota"] . "</p>";
                            echo "<p>Marca: " . $row["marca"] . "</p>";
                            echo "<p>Ano: " . $row["ano_fabricado"] . "</p>";
                            echo "<p>Modelo: " . $row["modelo"] . "</p>";
                            echo "<p>Tipo: " . $row["tipodoproduto"] . "</p>";
                            echo "</div>";
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['imagem'] ).'"/>';
                            echo '<div class="actions">';
                            echo '<a href="frota.php?edit_vehicle=1&id_frota='.$row["id_frota"].'">Editar</a> | <a href="frota.php?delete_vehicle=1&id_frota='.$row["id_frota"].'">Deletar</a>';
                            echo '</div>';
                            echo "</div>";
                        }
                    } else {
                        echo "0 resultados";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
