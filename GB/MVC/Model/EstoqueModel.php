<?php
class ControleEstoque_Model {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function cadastrarProduto($nomeProduto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem) {
        $query = "INSERT INTO bike.controleestoque (nomedoproduto, quantidade, preco, tipo, data, fornecedor, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssssss", $nomeProduto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem);
        return $stmt->execute();
    }
}
?>
