<?php
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nomedoproduto = $_POST['nomedoproduto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $fornecedor = $_POST['fornecedor'];
    $imagem = $_FILES['imagem']['name'];

    if ($imagem) {
        // Diretório de upload
        $target_dir = "../MVC/public/Estoque/uploads/";
        $target_file = $target_dir . basename($imagem);

        // Verificar se é uma imagem real
        $check = getimagesize($_FILES['imagem']['tmp_name']);
        if ($check === false) {
            die("O arquivo não é uma imagem.");
        }

        // Verificar se o arquivo já existe
        if (file_exists($target_file)) {
            die("Desculpe, o arquivo já existe.");
        }

        // Tamanho máximo do arquivo (5MB)
        if ($_FILES['imagem']['size'] > 5000000) {
            die("Desculpe, seu arquivo é muito grande.");
        }

        // Extensões permitidas
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            die("Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        // Tentar mover o arquivo
        if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $target_file)) {
            die("Desculpe, houve um erro ao enviar seu arquivo.");
        }

        // SQL com imagem
        $sql = "UPDATE controleestoque SET nomedoproduto = :nomedoproduto, quantidade = :quantidade, preco = :preco, tipo = :tipo, data = :data, fornecedor = :fornecedor, imagem = :imagem WHERE id_estoque = :id";
    } else {
        // SQL sem imagem
        $sql = "UPDATE controleestoque SET nomedoproduto = :nomedoproduto, quantidade = :quantidade, preco = :preco, tipo = :tipo, data = :data, fornecedor = :fornecedor WHERE id_estoque = :id";
    }

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nomedoproduto', $nomedoproduto);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':fornecedor', $fornecedor);
        if ($imagem) {
            $stmt->bindParam(':imagem', $imagem);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Registro atualizado com sucesso!";
    } catch (PDOException $e) {
        die("Erro ao atualizar o registro: " . $e->getMessage());
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM controleestoque WHERE id_estoque = :id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            die("Registro não encontrado.");
        }
    } catch (PDOException $e) {
        die("Erro ao buscar o registro: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Produto</title>
</head>
<body>
    <h2>Atualizar Produto</h2>
    <form method="post" action="atualizar.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id_estoque']); ?>">
        <label for="nomedoproduto">Nome do Produto:</label>
        <input type="text" name="nomedoproduto" value="<?php echo htmlspecialchars($row['nomedoproduto']); ?>"><br>
        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="<?php echo htmlspecialchars($row['quantidade']); ?>"><br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?php echo htmlspecialchars($row['preco']); ?>"><br>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?php echo htmlspecialchars($row['tipo']); ?>"><br>
        <label for="data">Data:</label>
        <input type="text" name="data" value="<?php echo htmlspecialchars($row['data']); ?>"><br>
        <label for="fornecedor">Fornecedor:</label>
        <input type="text" name="fornecedor" value="<?php echo htmlspecialchars($row['fornecedor']); ?>"><br>
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br>
        <input type="submit" value="Atualizar">
    </form>


    <style>

body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

h2 {
    color: #333;
    margin-top: 0;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #666;
}

input[type="text"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: #f44336;
    margin-top: 5px;
    font-size: 14px;
}

.success {
    color: #4caf50;
    margin-top: 5px;
    font-size: 14px;
}

</style>
</body>
</html>
