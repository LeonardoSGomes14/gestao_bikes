<?php
include_once 'C:/xampp/htdocs/gestao_bikes/GB/MVC/Model/BikeModel.php';

$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['acao']) && $_GET['acao'] == 'cadastrar') {
        $marca = $_POST['marca'];
        $ano_fabricado = $_POST['ano_fabricado'];
        $modelo = $_POST['modelo'];
        $tipodeveiculo = $_POST['tipodeveiculo'];
        $placaveiculo = $_POST['placaveiculo'];

        // Processar a imagem
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_destino = 'C:/xampp/htdocs/gestao_bikes/GB/Img/' . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_destino);

        $bikeModel = new BikeModel($pdo);
        
        if ($bikeModel->cadastrarBike($marca, $ano_fabricado, $modelo, $tipodeveiculo, $placaveiculo, $imagem_nome)) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar a bicicleta."; 
        }
    } else {
        include 'cadastro_bike.php'; // Aqui você pode renderizar a visão de cadastro
    }
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>
