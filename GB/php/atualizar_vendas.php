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

// Recupera os dados correspondentes ao ID fiscal
try {
    $sql = "SELECT * FROM controlefiscal WHERE id_fiscal = :id_fiscal";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_fiscal', $id_fiscal);
    $stmt->execute();
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$dados) {
        die("ID fiscal inválido.");
    }
} catch (PDOException $e) {
    die("Erro ao recuperar dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Dados Fiscais</title>
</head>
<body>
    <h1>Atualizar Dados Fiscais</h1>
    <form action="atualizar_processar.php" method="POST">
        <input type="hidden" name="id_fiscal" value="<?php echo $dados['id_fiscal']; ?>">
        <label for="transacoes">Transações:</label><br>
        <input type="text" id="transacoes" name="transacoes" value="<?php echo htmlspecialchars($dados['transacoes']); ?>"><br>
        <label for="fatura">Fatura:</label><br>
        <input type="text" id="fatura" name="fatura" value="<?php echo htmlspecialchars($dados['fatura']); ?>"><br>
        <label for="imposto">Imposto:</label><br>
        <input type="text" id="imposto" name="imposto" value="<?php echo htmlspecialchars($dados['imposto']); ?>"><br>
        <label for="orcamentos">Gasto Total:</label><br>
        <input type="text" id="orcamentos" name="orcamentos" value="<?php echo htmlspecialchars($dados['orcamentos']); ?>"><br><br>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
<script>
        function calcularCampos() {
            let transacoes = document.getElementById('transacoes').value;
            let fatura = document.getElementById('fatura').value;
            let imposto = document.getElementById('imposto').value;

            // Exemplo de cálculo automático
            if(transacoes && fatura && imposto) {
                let orcamentos = (parseFloat(transacoes) + parseFloat(fatura) + parseFloat(imposto)).toFixed(2);
                document.getElementById('orcamentos').value = orcamentos;
            }
        }
    </script>