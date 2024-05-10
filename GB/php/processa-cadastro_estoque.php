<?php
// Conectar ao banco de dados
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Processar os dados do formulário
    $nome_produto = $_POST['nome_produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $fornecedor = $_POST['fornecedor'];
    $imagem = $_FILES['imagem']['name'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];

    // Mover a imagem para o diretório de uploads
    move_uploaded_file($imagem_tmp, "../uploads/$imagem");

    // Preparar a declaração SQL para inserção de dados
    $stmt = $conn->prepare("INSERT INTO controleestoque (nomedoproduto, quantidade, preco, tipo, data, fornecedor, imagem) VALUES (:nome_produto, :quantidade, :preco, :tipo, :data, :fornecedor, :imagem)");

    // Bind dos parâmetros
    $stmt->bindParam(':nome_produto', $nome_produto);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':data', $data);
    $stmt->bindParam(':fornecedor', $fornecedor);
    $stmt->bindParam(':imagem', $imagem);

    // Executar a declaração SQL
    $stmt->execute();

    echo "Cadastro realizado com sucesso!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>