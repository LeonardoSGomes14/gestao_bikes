<?php
class BikeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function cadastrarBike($marca, $ano_fabricado, $modelo, $tipodoproduto) {
        try {
            $sql = "INSERT INTO controlefrota (marca, ano_fabricado, modelo, tipodoproduto) VALUES (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$marca, $ano_fabricado, $modelo, $tipodoproduto]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
