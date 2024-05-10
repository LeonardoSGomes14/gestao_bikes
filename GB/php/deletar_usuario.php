<?php
$host = 'localhost';
$dbname = 'bike';
$username = 'root';
$password = '';

try {
    // Conexão usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar com PDO: " . $e->getMessage());
}

// Conexão usando MySQLi
$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados com MySQLi: " . $mysqli->connect_error);
}

// Verifica se o ID do usuário foi enviado
if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    // Query SQL para deletar o usuário com o ID especificado
    $sql = "DELETE FROM usuarios WHERE id_user = $id_usuario";

    // Deleta o usuário usando PDO
    try {
        $pdo->exec($sql);
        echo "Usuário deletado com sucesso usando PDO";
    } catch (PDOException $e) {
        echo "Erro ao deletar usuário usando PDO: " . $e->getMessage();
    }

    // Deleta o usuário usando MySQLi
    if ($mysqli->query($sql) === TRUE) {
        echo "Usuário deletado com sucesso usando MySQLi";
    } else {
        echo "Erro ao deletar usuário usando MySQLi: " . $mysqli->error;
    }
} else {
    echo "ID de usuário não fornecido";
}

// Fecha a conexão MySQLi
$mysqli->close();
?>
