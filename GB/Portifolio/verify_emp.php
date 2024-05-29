<?php
if(!$_SESSION['id_empresa'] or !$_SESSION['cnpj']) {
    header('Location: ../login_empresa.php'); 
    exit();
}
