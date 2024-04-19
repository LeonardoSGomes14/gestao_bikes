<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config.php\config.php';

// Classe Empresa
class Empresa {
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

        // Insere os dados da empresa no banco de dados
        $sql = "INSERT INTO cadastro_empresa (nome, servicos, cnpj, cep, estado, rua, numero)
                VALUES ('$this->nome', '$this->servicos', '$this->cnpj', '$this->cep', '$this->estado', '$this->rua', '$this->numero')";
        if ($pdo->query($sql) == TRUE) {
            echo "Empresa cadastrada com sucesso!";
            // Redirecionar para o index.php após o cadastro
            header("Location: gestao_bikes\gestao_bikes\php\index.php ");
            exit(); // Certificar-se de que o script termina após o redirecionamento
        } else {
            echo "Erro ao cadastrar empresa: ";
        }
    }
}

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cria uma nova instância de Empresa
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
    <h2>Cadastro de Empresa</h2>
    <form action="cadastrar_empresa.php" method="post">
        <!-- Campos do formulário -->
        <input type="submit" value="Cadastrar">
    </form>

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
