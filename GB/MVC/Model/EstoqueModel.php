    <?php
    
    class EstoqueModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function  criarProduto($nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto)
    {
        $sql = "INSERT INTO controleestoque (nomedoproduto, quantidade, preco, tipo, data, fornecedor, imagem_produto)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor, $imagem_produto]);
    }



    public function listarProdutos()
    {
        $sql = "SELECT * FROM controleestoque";    
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }


    public function
    atualizarProduto(
    $id_estoque,
    $nome_produto,
    $quantidade,
    $preco, 
    $tipo,
    $data,
    $fornecedor,
    $imagem_produto
    ) {
        $sql = "UPDATE controleestoque SET nome_produto = ?, quantidade = ?, preco = ?, tipo = ?, data = ?, fornecedor = ?, imagem_produto = ?)
    WHERE id_estoque = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome_produto, $quantidade, $preco, $tipo, $data, $fornecedor,  $imagem_produto, $id_estoque]);
    }

}
?>
