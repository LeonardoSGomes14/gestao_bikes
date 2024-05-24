<?php

class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listUsers()
    {
        $sql = "SELECT * FROM usuarios";    
        $stmt = $this->pdo->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $users;
    }
}
?>
