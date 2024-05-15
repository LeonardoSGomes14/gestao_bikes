<?php
require '../../../config/config.php';
require '../../../MVC/Controller/SolicitacaoController.php';

$controller = new SolicitacaoController($pdo);
$controller->handleRequest();
?>
