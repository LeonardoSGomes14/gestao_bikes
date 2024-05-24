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

// Verifica se o ID fiscal foi passado via GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID fiscal não fornecido.");
}

$id_fiscal = $_GET['id'];

try {
    // Exclui o registro da tabela controlefiscal
    $sql = "DELETE FROM controlefiscal WHERE id_fiscal = :id_fiscal";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_fiscal', $id_fiscal);
    $stmt->execute();

    // Redireciona de volta para a página principal após a exclusão
    header('Location: controle_fiscal.php');
    exit();
} catch (PDOException $e) {
    die("Erro ao excluir registro: " . $e->getMessage());
}
?>
