<?php


$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
    
    // EstoqueController.php
    
    require_once '../Model/EstoqueModel.php';
    
    class EstoqueController {
        private $model;
    
        public function __construct() {
            $this->model = new EstoqueModel(/* Passar conexão com banco de dados aqui */);
        }
    
        public function exibirFormularioCadastro() {
            // Aqui você pode incluir a lógica para exibir o formulário de cadastro
            // Por exemplo:
            require_once 'EstoqueViews.php';
        }
    
        // Outros métodos do controlador...
    }
    
{
   

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomeProduto = $_POST['nomeProduto'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            $tipo = $_POST['tipo'];
            $data = $_POST['data'];
            $fornecedor = $_POST['fornecedor'];
            $imagem = $_FILES['imagem']['name']; // Nome do arquivo de imagem

            // Upload da imagem
            $uploadDir = 'uploads/'; // Diretório de upload
            $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);

            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                $mensagem = "Imagem enviada com sucesso.";
            } else {
                $mensagem = "Erro ao enviar imagem.";
            }

            // Cadastro do produto
            if ($this->model->cadastrarProduto($nomeProduto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem)) {
                $mensagem = "Produto cadastrado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar produto.";
            }
        }

        // Passa a mensagem para a view
        require 'formulario_cadastro_produto.php';
    }

?>


<?php
include_once 'C:/xampp/htdocs/gestao_bikes/GB/MVC/Model/BikeModel.php';


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
