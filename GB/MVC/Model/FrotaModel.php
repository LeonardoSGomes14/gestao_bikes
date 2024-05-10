<?php
class FrotaModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function cadastrarFrota($marca, $ano_fabricado, $modelo, $tipodeveiculo, $placaveiculo, $imagem_nome)
    {

        $sql = "INSERT INTO controlefrota (marca, ano_fabricado, modelo, tipodeveiculo, placaveiculo, imagem) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$marca, $ano_fabricado, $modelo, $tipodeveiculo, $placaveiculo, $imagem_nome]);

        return $stmt->rowCount();
    }
}
