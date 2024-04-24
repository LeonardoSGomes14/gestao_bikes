<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/cadastraADM.css">
    <title>Document</title>
</head>
<body>
    
<?php
session_start();

$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $email = $_POST["email"];
    $cargo = $_POST["cargo"]; // Adicionando o campo do cargo

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bike", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão com o Banco de Dados: " . $e->getMessage());
    }

    // Verifica se o usuário já está cadastrado no banco de dados
    $stmt_check = $pdo->prepare("SELECT * FROM usuariosCargos WHERE usuario = ?");
    $stmt_check->execute([$usuario]);

    if ($stmt_check->rowCount() > 0) {
        $mensagem = "Usuário já cadastrado. Escolha um nome de usuário diferente.";
    } else {
        // Insere os dados na tabela 'usuarios'
        $stmt_insert = $pdo->prepare("INSERT INTO usuariosADM (usuario, senha, email, cargo) VALUES (?, ?, ?, ?)");
        $stmt_insert->execute([$usuario, $senha, $email, $cargo]);

        if ($stmt_insert->rowCount() > 0) {
            $_SESSION["usuario"] = $usuario;
            $mensagem = "Usuário cadastrado com sucesso!";
            header("Location: Processa_Cadastro_cargo.php");
        } else {
            $mensagem = "Erro ao cadastrar o usuário. Tente novamente.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de login</title>
    <link rel="stylesheet" href="../Css/cadastro_cargo.css">
</head>
<body>
<div class="background-container">
    <img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px">
    <div class="container">
        <h1>Cadastrar Cargos</h1>
        <h2><?php echo $mensagem; ?></h2>
        

        <form method="post">
            <table>
                <tr>
                    <td><input type="text" name="usuario" placeholder="Nome de Usuário" required></td>
                </tr>
                <tr>
                    <td><input type="password" name="senha" placeholder="Senha" required></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td>
                        <select name="cargo" required>
                            <option value="" disabled selected>Selecione o Cargo</option>
                            <option value="CEO">CEO</option>
                            <option value="Gerente">GERENTE</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="ESTAGIARIO">ESTAGIÁRIO</option>
                            <option value="COMERCIAL">COMERCIAL</option>
                            <option value="FUNCIONARIO">FUNCIONARIO</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Cadastrar"></td>
                </tr>
            </table>
        </form>

        <h2><a href="index.php">Voltar</a></h2>
        
    </div>
</div>
</body>
</html>



