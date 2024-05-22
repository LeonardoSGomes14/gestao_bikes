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

// Verifica se o ID do produto a ser deletado foi enviado via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Consulta SQL para deletar o registro com o ID especificado
        $sql = "DELETE FROM controleestoque WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Redireciona de volta para a página de visualização de produtos após a exclusão
        header("Location: visualizar.php");
        exit();
    } catch (PDOException $e) {
        die("Erro ao excluir o registro: " . $e->getMessage());
    }
} else {
    // Se o ID não foi fornecido, redireciona para a página de visualização de produtos
    header("Location: visualizar.php");
    exit();
}
