<?php
include_once('../config/config.php');
include_once('../MVC/Controller/UserController.php');
require_once('../MVC/Model/UserModel.php');

// Consulta ao banco de dados para obter todas as pessoas cadastradas
$sql_code = $pdo->prepare("SELECT * FROM usuarios");
$sql_code->execute();
$pessoas = $sql_code->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos do formulário foram preenchidos
    if (isset($_POST['id']) && isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['datadenascimento']) && isset($_POST['cpf']) && isset($_POST['genero']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['tipo_funcionario']) && isset($_POST['cep']) && isset($_POST['cidade']) && isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['complemento']) && isset($_POST['hora_entrada']) && isset($_POST['hora_saida']) && isset($_POST['carga_horaria']) && isset($_POST['remuneracao']) && isset($_POST['data_contratacao'])) {
        
        // Inclua o arquivo de configuração do banco de dados
        include_once('../config/config.php');

        // Atualize os dados do usuário no banco de dados
        $sql_code = $pdo->prepare("UPDATE usuarios SET nome_completo=?, nome_usuario=?, datadenascimento=?, cpf=?, genero=?, phone=?, email=?, tipo_funcionario=?, cep=?, cidade=?, rua=?, numero=?, complemento=?, hora_entrada=?, hora_saida=?, carga_horaria=?, remuneracao=?, data_contratacao=? WHERE id_user=?");

        $sql_code->execute(array($_POST['nome_completo'], $_POST['nome_usuario'], $_POST['datadenascimento'], $_POST['cpf'], $_POST['genero'], $_POST['phone'], $_POST['email'], $_POST['tipo_funcionario'], $_POST['cep'], $_POST['cidade'], $_POST['rua'], $_POST['numero'], $_POST['complemento'], $_POST['hora_entrada'], $_POST['hora_saida'], $_POST['carga_horaria'], $_POST['remuneracao'], $_POST['data_contratacao'], $_POST['id']));

        // Redirecione de volta para a página de exibição de usuários
        header("Location: exibir-usuarios.php");
        exit();
    }
}



echo "<h2>Pessoas Cadastradas</h2>";
echo "<table>";
echo "<tr><th>ID</th><th>Nome Completo</th><th>Nome de Usuário</th><th>Data de Nascimento</th><th>CPF</th><th>Gênero</th><th>Telefone</th><th>Email</th><th>Tipo de Funcionário</th><th>CEP</th><th>Cidade</th><th>Rua</th><th>Número</th><th>Complemento</th><th>Hora de Entrada</th><th>Hora de Saída</th><th>Carga Horária</th><th>Remuneração</th><th>Data de Contratação</th><th>Foto de Perfil</th><th>Deletar</th><th>Atualizar</th></tr>";

foreach ($pessoas as $pessoa) {
    echo "<tr>";
    echo "<td>" . $pessoa['id_user'] . "</td>";
    echo "<td>" . $pessoa['nome_completo'] . "</td>";
    echo "<td>" . $pessoa['nome_usuario'] . "</td>";
    echo "<td>" . $pessoa['datadenascimento'] . "</td>";
    echo "<td>" . $pessoa['cpf'] . "</td>";
    echo "<td>" . $pessoa['genero'] . "</td>";
    echo "<td>" . $pessoa['phone'] . "</td>";
    echo "<td>" . $pessoa['email'] . "</td>";
    echo "<td>" . $pessoa['tipo_funcionario'] . "</td>";
    echo "<td>" . $pessoa['cep'] . "</td>";
    echo "<td>" . $pessoa['cidade'] . "</td>";
    echo "<td>" . $pessoa['rua'] . "</td>";
    echo "<td>" . $pessoa['numero'] . "</td>";
    echo "<td>" . $pessoa['complemento'] . "</td>";
    echo "<td>" . $pessoa['hora_entrada'] . "</td>";
    echo "<td>" . $pessoa['hora_saida'] . "</td>";
    echo "<td>" . $pessoa['carga_horaria'] . "</td>";
    echo "<td>" . $pessoa['remuneracao'] . "</td>";
    echo "<td>" . $pessoa['data_contratacao'] . "</td>";
    echo "<td>" . $pessoa['foto_perfil'] . "</td>";

  
    // Botão para deletar
    echo "<td>";
    echo "<form method='post' action='deletar_usuario.php'>"; // Formulário para enviar a solicitação de deletar
    echo "<input type='hidden' name='id_usuario' value='" . $pessoa['id_user'] . "'>"; // Envia o ID do usuário a ser deletado
    echo "<button type='submit'>Deletar</button>"; // Botão de deletar
    echo "</form>";
    echo "<td>";
    echo "<a href='atualizar-usuario.php?id=" . $pessoa['id_user'] . "'>Atualizar</a>";
    echo "</td>";
    
    echo "</td>";
    
    echo "</tr>";
}

echo "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
/* Estilos gerais */
body {
    font-family: Arial, sans-serif;
}

/* Estilo da tabela */
table {
    width: 90%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

/* Estilo dos botões */
button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Estilo dos formulários */
form {
    margin-bottom: 20px;
}

form input[type="text"], form input[type="email"], form input[type="date"], form input[type="number"] {
    width: 90%;
    padding: 10px;
    margin: 5px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 210px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

        </style>
    
</body>
</html>