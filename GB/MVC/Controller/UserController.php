<?php
require_once 'C:\xampp\htdocs\gestao_bikes\GB\MVC\Model\UserModel.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        
        $this->userModel = new UserModel($pdo);
    }

    public function displayUserList()
    {
        $users = $this->userModel->listUsers();
        include 'C:\xampp\htdocs\gestao_bikes\GB\MVC\Views\UserViews.php';
    }
    

}
?>
