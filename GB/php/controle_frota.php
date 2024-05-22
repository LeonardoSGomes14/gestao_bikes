<?php

require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';


// Classe Frota
class Frota {
    // propriedades e métodos aqui...
    public $marca;
    public $anodefabricacao;
    public $modelo;
    public $tipodeveiculo;
    public $placadoveiculo;
    public $imagem_frota;
    

    // Método para cadastrar a frota
    public function cadastrar() {
        global $pdo;

        try {
            // Prepara a consulta SQL
            $stmt = $pdo->prepare("INSERT INTO controlefrota (marca, anodefabricacao, modelo, tipodeveiculo, placadoveiculo, imagem_frota) VALUES (?, ?, ?, ?, ?, ?, ?)");

            // Executa a consulta com os valores dos parâmetros
            $stmt->execute([$this->marca, $this->anodefabricacao, $this->modelo, $this->tipodeveiculo, $this->placadoveiculo, $this->imagem_frota]);

            echo "Frota cadastrada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar frota: " . $e->getMessage();
        }
    }
}

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // cria uma nova instância de Frota
    $frota = new Frota();
    // Define as propriedades da frota com os dados do formulário
    $frota->marca = $_POST['marca'];
    $frota->anodefabricacao = $_POST['anodefabricacao'];
    $frota->modelo = $_POST['modelo'];
    $frota->tipodeveiculo = $_POST['tipodeveiculo'];
    $frota->placadoveiculo = $_POST['placadoveiculo'];
    $frota->imagem_frota = $_POST['imagem_frota '];
    

    // Chama o método para cadastrar a frota
    $frota->cadastrar();
}

// Restante do código HTML e JavaScript...



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Frota de Bicicletas</title>
        
</head>
<body>
    
    <header>
        <h1>Controle de Frota de Bicicletas</h1>
    </header>
    <h3>Cadastro de Frota</h3>
    <div class="background-container">
        <img class="logo" src="../../Img/bitrix-removebg-preview.png" width="210px">
        <form  method="POST" enctype="multipart/form-data">
            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="anodefabricacao">Ano de Fabricação:</label>
            <input type="text" id="anodefabricacao" name="anodefabricacao" required>

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" required>

            <label for="tipodeveiculo">Tipo de Veículo:</label>
            <input type="text" id="tipodeveiculo" name="tipodeveiculo" required>

            <label for="placadoveiculo">Placa do Veículo:</label>
            <input type="text" id="placadoveiculo" name="placadoveiculo" required>

            <label for="imagem_frota">Imagem:</label>
            <input type="file" id="imagem_frota" name="imagem_frota" accept="image_frota/*" required>

            <input type="submit" value="Cadastrar">
        </form>
    
    <a class="volt" href="../../Portifolio/index.php">Voltar</a>
   
</body>
</html>
