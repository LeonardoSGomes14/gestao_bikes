<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

if (isset($_GET['id'])) {
    $id_empresa = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM cadastro_empresa WHERE id_empresa = ?");
        $stmt->execute([$id_empresa]);

        echo "<p>Empresa deletada com sucesso!</p>";
        echo "<a href='controle_empresa.php'>Voltar para a página inicial</a>";
    } catch (PDOException $e) {
        echo "<p>Erro ao deletar empresa: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p>ID da empresa não fornecido.</p>";
}
?>
