<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

// Classe Empresa
class Empresa {
    // propriedades e métodos aqui...
    public $nome;
    public $servicos;
    public $cnpj;
    public $cep;
    public $estado;
    public $rua;
    public $numero;

    // Método para cadastrar a empresa
    public function cadastrar() {
        global $pdo;

        try {
            // Prepara a consulta SQL
            $stmt = $pdo->prepare("INSERT INTO cadastro_empresa (nome, servicos, cnpj, cep, estado, rua, numero) VALUES (?, ?, ?, ?, ?, ?, ?)");

            // Executa a consulta com os valores dos parâmetros
            $stmt->execute([$this->nome, $this->servicos, $this->cnpj, $this->cep, $this->estado, $this->rua, $this->numero]);

            echo "Empresa cadastrada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar empresa: " . $e->getMessage();
        }
    }
}

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // cria uma nova instância de Empresa
    $empresa = new Empresa();
    // Define as propriedades da empresa com os dados do formulário
    $empresa->nome = $_POST['nome'];
    $empresa->servicos = $_POST['servicos'];
    $empresa->cnpj = $_POST['cnpj'];
    $empresa->cep = $_POST['cep'];
    $empresa->estado = $_POST['estado'];
    $empresa->rua = $_POST['rua'];
    $empresa->numero = $_POST['numero'];

    // Chama o método para cadastrar a empresa
    $empresa->cadastrar();
}

// Restante do código HTML e JavaScript...
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <a class="volt" href="cadastrar_empresa.php">Voltar</a>
    <script>
        function consultarCEP() {
            var cep = document.getElementById('cep').value;
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        document.getElementById('estado').value = data.uf;
                        document.getElementById('rua').value = data.logradouro;
                    }
                })
                .catch(error => {
                    console.error('Erro ao consultar o CEP:', error);
                    alert('Erro ao consultar o CEP.');
                });
        }
    </script>
</body>
</html>
