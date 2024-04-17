<?php
require_once 'config.php';

// Classe Empresa
class Empresa {
    public $id_empresa;
    public $nome;
    public $servicos;
    public $cnpj;
    public $cep;
    public $estado;
    public $rua;
    public $numero;

    // Método para cadastrar a empresa
    public function cadastrar() {
        global $conn;

        // Verifica se o CEP foi fornecido
        if (!empty($this->cep)) {
            // Consulta o CEP na base de dados ou em uma API externa (neste caso, usaremos um exemplo simples)
            $sql = "SELECT estado, rua FROM tabela_de_cep WHERE cep = '$this->cep'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Se o CEP existe, preenche o estado e a rua
                $row = $result->fetch_assoc();
                $this->estado = $row["estado"];
                $this->rua = $row["rua"];
            } else {
                // Se o CEP não existe, defina o estado e a rua como vazios ou manipule de acordo com sua lógica
                $this->estado = "";
                $this->rua = "";
            }
        }

        // Insere os dados da empresa no banco de dados
        $sql = "INSERT INTO empresas (id_empresa, nome, servicos, cnpj, cep, estado, rua, numero)
                VALUES ('$this->id_empresa', '$this->nome', '$this->servicos', '$this->cnpj', '$this->cep', '$this->estado', '$this->rua', '$this->numero')";

        if ($conn->query($sql) === TRUE) {
            echo "Empresa cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar empresa: " . $conn->error;
        }
    }
}

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cria um objeto Empresa
    $empresa = new Empresa();
    $empresa->id_empresa = $_POST['id_empresa'];
    $empresa->nome = $_POST['nome'];
    $empresa->servicos = $_POST['servicos'];
    $empresa->cnpj = $_POST['cnpj'];
    $empresa->cep = $_POST['cep'];
    $empresa->numero = $_POST['numero'];

    // Chama o método para cadastrar a empresa
    $empresa->cadastrar();
}
?>
