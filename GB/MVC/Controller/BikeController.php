<?php
include_once '../Model/BikeModel.php';

// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controlador
    if (isset($_GET['acao']) && $_GET['acao'] == 'cadastrar') {
        // Receber dados do formulário
        $marca = $_POST['marca'];
        $ano_fabricado = $_POST['ano_fabricado'];
        $modelo = $_POST['modelo'];
        $tipodoproduto = $_POST['tipodoproduto'];

        // Instanciar o Model
        $bikeModel = new BikeModel($pdo);

        // Chamar método do Model para cadastrar a bicicleta
        if ($bikeModel->cadastrarBike($marca, $ano_fabricado, $modelo, $tipodoproduto)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar a bicicleta.";
        }
    } else {
        // Carregar a view de cadastro
        include 'cadastro_bike.php';
    }
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>
