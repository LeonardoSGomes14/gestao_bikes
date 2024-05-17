<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\MVC\Model\EstoqueModel.php';

class estoqueController
{
    private $estoquemodel;

    public function __construct($pdo)
    {
        $this->estoquemodel = new estoqueModel($pdo);
    }

    public function criarProduto($nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto)
    {
        $this->estoquemodel->criarProduto($nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto);
    }

    public function listarProdutos()
    {
        return $this->estoquemodel->listarProdutos();
    }

    public function exibirListaprodutos()
    {
        $users = $this->estoquemodel->listarProdutos();
        include 'C:\xampp\htdocs\gestao_bikes\GB\MVC\Views\EstoqueViews.php';
    }

    public function atualizarProduto($id_estoque, $nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto)
    {
        $this->estoquemodel->atualizarProduto($id_estoque, $nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto);
    }

}
