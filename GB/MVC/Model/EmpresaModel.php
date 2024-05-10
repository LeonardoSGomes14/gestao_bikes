<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

class Empresa {
    public $nome;
    public $servicos;
    public $cnpj;
    public $cep;
    public $estado;
    public $rua;
    public $numero;

    public function cadastrar() {
        global $pdo;

        try {
            $stmt = $pdo->prepare("INSERT INTO cadastro_empresa (nome, servicos, cnpj, cep, estado, rua, numero) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$this->nome, $this->servicos, $this->cnpj, $this->cep, $this->estado, $this->rua, $this->numero]);

            echo "Empresa cadastrada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar empresa: " . $e->getMessage();
        }
    }
}
?>
