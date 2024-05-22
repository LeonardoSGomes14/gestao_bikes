<?php
session_start();


include_once('../config/config.php');
include_once('../MVC/Controller/UserController.php');
require_once('../MVC/Model/UserModel.php');



$sql_code = $pdo->prepare("SELECT * FROM usuarios");
$sql_code->execute();
$pessoas = $sql_code->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['id']) && isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) && isset($_POST['datadenascimento']) && isset($_POST['cpf']) && isset($_POST['genero']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['tipo_funcionario']) && isset($_POST['cep']) && isset($_POST['cidade']) && isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['complemento']) && isset($_POST['hora_entrada']) && isset($_POST['hora_saida']) && isset($_POST['carga_horaria']) && isset($_POST['remuneracao']) && isset($_POST['data_contratacao'])) {



    $sql_code = $pdo->prepare("UPDATE usuarios SET nome_completo=?, nome_usuario=?, datadenascimento=?, cpf=?, genero=?, phone=?, email=?, tipo_funcionario=?, cep=?, cidade=?, rua=?, numero=?, complemento=?, hora_entrada=?, hora_saida=?, carga_horaria=?, remuneracao=?, data_contratacao=? WHERE id_user=?");

    $sql_code->execute(array($_POST['nome_completo'], $_POST['nome_usuario'], $_POST['datadenascimento'], $_POST['cpf'], $_POST['genero'], $_POST['phone'], $_POST['email'], $_POST['tipo_funcionario'], $_POST['cep'], $_POST['cidade'], $_POST['rua'], $_POST['numero'], $_POST['complemento'], $_POST['hora_entrada'], $_POST['hora_saida'], $_POST['carga_horaria'], $_POST['remuneracao'], $_POST['data_contratacao'], $_POST['id']));

    header("Location: gestaorh.php");
    exit();
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/gestaorh.css">
  <title>Document</title>
</head>

<body>

  <div class="comeco">
  <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a> 

    <div id="menu">
      <div id="menu-bar" onclick="menuOnClick()">
        <div id="bar1" class="bar"></div>
        <div id="bar2" class="bar"></div>
        <div id="bar3" class="bar"></div>
      </div>
      <nav class="nav" id="nav">
        <ul>
          <img src="../Img/Image 2024-04-17 at 08.04.01.jpeg" style="border-radius: 50%;" width="135px" height="120px">
          <a href="#" class="confirm-link" onclick="confirmLogout()">

            <a href="#" class="confirm-link" onclick="confirmLogout()">
              <?php



              if (!isset($_SESSION["usuario"])) {
                echo '<a class="conect" href="login.php">Conecte-se</a>';
              } else {
                echo '<h1 class="conect">Olá, ' . $_SESSION["usuario"] . '</h1>';
              }
              ?>
            </a>
            <li><a href="#">Home</a></li>
            <li><a href="../MVC/Views/SolicitacaoViews.php">Solicitações</a></li>
            <li><a href="#">Recibo</a></li>
        </ul>
      </nav>
    </div>
    </div>


<br><br><br><br><br><br><br><br><br><br><br>

      <?php
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


       
    echo "<td>";
    echo "<form method='post' action='deletar_usuario.php'>"; 
    echo "<input type='hidden' name='id_usuario' value='" . $pessoa['id_user'] . "'>"; 
    echo "<button type='submit'>Deletar</button>"; 
    echo "</form>";
    echo "<td>";
    echo "<a href='atualizar_usuario.php?id=" . $pessoa['id_user'] . "'>Atualizar</a>";
    echo "</td>";
    
    echo "</td>";
    
    echo "</tr>";

        echo "</table>";
      }
      ?>

      </section>
</body>

</html>
<script>
  function menuOnClick() {
    document.getElementById("menu-bar").classList.toggle("change");
    document.getElementById("nav").classList.toggle("change");
    document.getElementById("menu-bg").classList.toggle("change-bg");
  }
</script>