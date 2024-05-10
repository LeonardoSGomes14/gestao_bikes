<?php
include_once 'C:/xampp/htdocs/gestao_bikes/GB/MVC/Model/FrotaModel.php';

$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';


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
        $imagem_destino = 'C:/xampp/htdocs/gestao_bikes/GB/MVC/public/frota' . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_destino);

        $FrotaModel = new FrotaModel($pdo);
       
        $resultado = $FrotaModel->cadastrarFrota($marca, $ano_fabricado, $modelo, $tipodeveiculo, $placaveiculo, $imagem_nome);
       
        if ($resultado !== 0) {
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            header('Location: ../../php/index.php');
        } else {
            echo "Erro ao cadastrar a Frota."; 
        }
    } else {
        include 'C:\xampp\htdocs\gestao_bikes\GB\MVC\Views\FrotaViews.php'; // Aqui você pode renderizar a visão de cadastro
    }
?>
