<?php
require 'verificar_permissao.php';

verificarPermissao([1,4]);
 
?>




<?php


include_once ('../config/config.php');
include_once ('../MVC/Controller/UserController.php');
require_once ('../MVC/Model/UserModel.php');

$sql_code = $pdo->prepare("SELECT * FROM usuarios");
$sql_code->execute();
$pessoas = $sql_code->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (
    isset($_POST['id']) && isset($_POST['nome_completo']) && isset($_POST['nome_usuario']) &&
    isset($_POST['datadenascimento']) && isset($_POST['cpf']) && isset($_POST['genero']) &&
    isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['tipo_funcionario']) &&
    isset($_POST['cep']) && isset($_POST['cidade']) && isset($_POST['rua']) &&
    isset($_POST['numero']) && isset($_POST['complemento']) && isset($_POST['hora_entrada']) &&
    isset($_POST['hora_saida']) && isset($_POST['carga_horaria']) && isset($_POST['remuneracao']) &&
    isset($_POST['data_contratacao'])
  ) {
    $sql_code = $pdo->prepare(
      "UPDATE usuarios SET 
      nome_completo=?, nome_usuario=?, datadenascimento=?, cpf=?, genero=?, phone=?, email=?, 
      tipo_funcionario=?, cep=?, cidade=?, rua=?, numero=?, complemento=?, hora_entrada=?, 
      hora_saida=?, carga_horaria=?, remuneracao=?, data_contratacao=? WHERE id_user=?"
    );

    $sql_code->execute([
      $_POST['nome_completo'],
      $_POST['nome_usuario'],
      $_POST['datadenascimento'],
      $_POST['cpf'],
      $_POST['genero'],
      $_POST['phone'],
      $_POST['email'],
      $_POST['tipo_funcionario'],
      $_POST['cep'],
      $_POST['cidade'],
      $_POST['rua'],
      $_POST['numero'],
      $_POST['complemento'],
      $_POST['hora_entrada'],
      $_POST['hora_saida'],
      $_POST['carga_horaria'],
      $_POST['remuneracao'],
      $_POST['data_contratacao'],
      $_POST['id']
    ]);

    header("Location: gestaorh.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/gestaorh.css">
  <title>GESTÃO DE BIKES</title>
</head>

<body>
  <div class="comeco">
    <div class="retangulo"></div>
    <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
    <a href="../Portifolio/index.php"><img class="logo" src="../Img/bitrix-removebg-preview.png" width="300px"></a>
  </div>

  <div class="sidebar">
    <button onclick="window.location.href='../Portifolio/index.php'">Home</button>
    <button onclick="window.location.href='../MVC/public/Solicitacao/index.php'">Solicitações</button>
    <button onclick="window.location.href='../php/recibosolicitacao.php'">Recibo</button>
  </div>
  <div class="content">
    <h2>Pessoas Cadastradas</h2>
    <div class="pessoas-container">
      <?php foreach ($pessoas as $pessoa): ?>
        <div class="pessoa">
          <div><strong>ID:</strong> <?php echo $pessoa['id_user']; ?></div>
          <div><strong>Nome Completo:</strong> <?php echo $pessoa['nome_completo']; ?></div>
          <div><strong>Nome de Usuário:</strong> <?php echo $pessoa['nome_usuario']; ?></div>
          <div><strong>Data de Nascimento:</strong> <?php echo $pessoa['datadenascimento']; ?></div>
          <div><strong>CPF:</strong> <?php echo $pessoa['cpf']; ?></div>
          <div><strong>Gênero:</strong> <?php echo $pessoa['genero']; ?></div>
          <div><strong>Telefone:</strong> <?php echo $pessoa['phone']; ?></div>
          <div><strong>Email:</strong> <?php echo $pessoa['email']; ?></div>
          <div><strong>Tipo de Funcionário:</strong> <?php echo $pessoa['tipo_funcionario']; ?></div>
          <div><strong>CEP:</strong> <?php echo $pessoa['cep']; ?></div>
          <div><strong>Cidade:</strong> <?php echo $pessoa['cidade']; ?></div>
          <div><strong>Rua:</strong> <?php echo $pessoa['rua']; ?></div>
          <div><strong>Número:</strong> <?php echo $pessoa['numero']; ?></div>
          <div><strong>Complemento:</strong> <?php echo $pessoa['complemento']; ?></div>
          <div><strong>Hora de Entrada:</strong> <?php echo $pessoa['hora_entrada']; ?></div>
          <div><strong>Hora de Saída:</strong> <?php echo $pessoa['hora_saida']; ?></div>
          <div><strong>Carga Horária:</strong> <?php echo $pessoa['carga_horaria']; ?></div>
          <div><strong>Remuneração:</strong> <?php echo $pessoa['remuneracao']; ?></div>
          <div><strong>Data de Contratação:</strong> <?php echo $pessoa['data_contratacao']; ?></div>
          <div><strong>Foto de Perfil:</strong> <?php echo $pessoa['foto_perfil']; ?></div>
          <div>
            <form method="post" action="deletar_usuario.php">
              <input type="hidden" name="id_usuario" value="<?php echo $pessoa['id_user']; ?>">
              <button type="submit">Deletar</button>
            </form>
          </div>
          <div><a href="atualizar_usuario.php?id=<?php echo $pessoa['id_user']; ?>">Atualizar</a></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
    function menuOnClick() {
      document.getElementById("menu-bar").classList.toggle("change");
      document.getElementById("nav").classList.toggle("change");
      document.getElementById("menu-bg").classList.toggle("change-bg");
    }
  </script>
</body>

</html>