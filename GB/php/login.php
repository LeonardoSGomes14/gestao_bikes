<?php
session_start();
require_once('../config/config.php');
require_once('../MVC/Controller/UserController.php');
require_once('../MVC/Model/UserModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['entrar'])) {
    // Verifique se os campos de email e senha foram preenchidos
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Limpeza dos dados de entrada para evitar injeção de SQL
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];  // Não sanitizar a senha antes de comparar o hash

        // Prepare e execute a consulta
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifique se a senha está correta
            if (password_verify($senha, $user['senha'])) {
                // Define as variáveis de sessão
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nome_completo'] = $user['nome_completo'];
                $_SESSION['permissao'] = $user['tipo_funcionario'];
                $tipo_funcionario = $user['tipo_funcionario'];

                // Redireciona com base no tipo de usuário
                switch ($tipo_funcionario) {
                    case 0:
                        header("Location: ../Portifolio/");
                        exit();
                    case 1:
                        header("Location: adm.php");
                        exit();
                    default:
                        echo "USUÁRIO SEM PERMISSÃO, FAVOR CONTATAR O ADMIN!!";
                        break;
                }
            } else {
                // Senha incorreta
                echo '<script>
                        function exibirCaixaDialogo() {
                            alert("Algumas de suas credenciais estão incorretas, tente novamente!");
                        }
                        window.onload = exibirCaixaDialogo;
                      </script>';
            }
        } else {
            // Usuário não encontrado
            echo '<script>
                    function exibirCaixaDialogo() {
                        alert("Algumas de suas credenciais estão incorretas, tente novamente!");
                    }
                    window.onload = exibirCaixaDialogo;
                  </script>';
        }
    }
}
?>

<?php


//CADASTRO


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['cadastrar']) {
    $nome_completo = $_POST['nome_completo'];
    $nome_usuario = $_POST['nome_completo'];
    $datadenascimento = $_POST['datadenascimento'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['genero'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_funcionario = $_POST['tipo_funcionario'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_saida = $_POST['hora_saida'];
    $carga_horaria = $_POST['carga_horaria'];
    $remuneracao = $_POST['remuneracao'];
    $data_contratacao = $_POST['data_contratacao'];
    $foto_perfil = $_POST['foto_perfil'];

    // Verificar se uma imagem foi enviada
    if ($_FILES['foto_perfil']['name']) {
        $img_nome = $_FILES['foto_perfil']['name'];
        $img_tmp = $_FILES['foto_perfil']['tmp_name'];

        $upload_dir = 'C:/xampp/htdocs/gestao_bikes/GB/uploads/';
        $destination = $upload_dir . $img_nome;
        move_uploaded_file($img_tmp, $destination);
    }


    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE nome_completo = ? AND nome_usuario = ? AND email = ? AND senha = ?');
    $stmt->execute([$nome_completo, $nome_usuario, $email, $senha]);
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        echo 'Esse perfil já foi cadastrado.';
    } else {
        $userController = new usuarioController($pdo);

        $userController->criarUser($nome_completo, $nome_usuario, $datadenascimento, $cpf, $genero, $phone, $email, $senha, $tipo_funcionario, $cep, $cidade, $rua, $numero, $complemento, $hora_entrada, $hora_saida, $carga_horaria, $remuneracao, $data_contratacao, $img_nome);
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Cadastro/Login</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/cad_user.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>

    <div class="main">
        <div class="container a-container" id="a-container">
            <form class="form" id="a-form" method="post" enctype="multipart/form-data">
                <h2 class="form_title title">Criar uma conta</h2>
                <div class="form__icons"><img class="form__icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACd0lEQVR4nO2Zv2sUQRTHP+evwigSrCyiAWOpTXpBxcRcCkn8BVrZif+AjUJQSA5Jo4VpbMQiJtrE/CCojZ3YGEQx9nYaE6PRxOJWBp4Qwu7czuzb3Tm4L3zhmn1vPszsm7fvoKWWgtceoArUgGlgEfgO/BWb35+A58AI0CfPBKGKLGgSWAciR/8BJoAzEqsUXQDeeyw+yQvAYJEAR4BXigBb/QLoyhviHLCSI0QkXgUu5wFgzu9QAQDRFtc03x0TaKwEiEj8QAtmpESISHwnK8SlACAi8ZUs1emn0iLMffFQSraJux/YB7QDncBRYLRBjB/AYR8QrRL7EjiQIt/VFLHmXSHOK0HMAjtS5kwDYjyQFqKidGN/kyOEMsi7tFWsT2k3hh0gXEAioDdNwEklkGOWHN3Afcn1328dYo83gtjr2cXGVZjtFoiNjPF/A7ttIFXFTjZJj5Ry9NhAakpJXltyfCniHZxWSjKXEL8iX4saOaZsIJ8V74847VKKH8lnc6KWmgjkqw1ko4lA1rVBBqT522zbdKQ9wXcd85q1JmrZA+Q0Onri0QIlarFEENNDueT9aAs2WxLINmBNs/wOlwRySPvzt98j4HXpnza7y3Ihdsf4mkfeXhuIacR+eQQtuvyuAW2NtvlpE4BMkEI9TQByKg2IOccfAgZZwEFnAwapUuA4KC+QeTzUKVPxUEBWgIN4yjSE9QBA6sBFMup2ACBDKOleiSCjKOuGwzHTAKlr7kTcX2/LBYAsucx4s3SqMzmCTAEdFKh+y5jTB+SNzJ1L03HgsYxJXUFWZfJoYgQjs8iTwE0pDHHaCTwDbgEn5JmWWiJg/QOlYrQmouYwLQAAAABJRU5ErkJggg=="><img class="form__icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACwElEQVR4nO2ZSWsUURSFP5WYDoqiRiPigAvBP+BCiWsxDqigoMZf4EKIgqgrd6IoCCrOA1m5cCW208JFjCDGnWDiiANBQaIimnRi8uTJFZpQ1bxb9V5VteTAgV503fNOveneWzCB/xuzgE3AMeAW0AsMABVgWH73AWX5j/3vHAqCRqAduAv8BoySI8AdiTE1DwNNQAfQn2DwcewH9srLyQRtwGuPBsbzjWgEQwk4G9CAqeIYcF5m3ivmA08zMmGq+BhY4MvEUuBVDiaM8J2ciKkwV45MkyMP+dgTeSwnU8X9eMC5ep8Ji3UeBlKR9f0I6JZ9NpzlTDTJWZ5k8IPAJWC9LM3xmCZ3xGUxGsyExb6E5/5VYDHuWAR0hjJRSpB2/AK2p9C0z/7wacJiVwITqzzotuAZ95XLaQcFxGxgVGHkCgXFFuXppNnYmeKEwsgFx5iTgJ5APBwnelthZK3CiAmYGUfCNcMdUlRxIY18ixMdcAxgb30KYMQAM6NERxwfflggIwujRF0Tuu4CGVkeJfrV8eG3BTKyJEr0ZZ1tdgM0R4mWFQHaCmCkAkyJEj2uCHKxAEb64kQ3B0hRrJEjCvYoxnCzVtKo6d9ewy+mA58V+gdrBbunnN6dHo2cVGqvrBWsXRnMLrFWDya2SX3jqvsFaPBd6g7KC0hT6rpexv94yiVwR8JTpDPugopBc4qm+AoXgVKKXu+QtHo2xnTSG6TGt/vhe0KNB4qX9bfeMClpl8sHadB1Ac/EaNq4rShxxoOob94gAewSe1KAwRvhJ2AeKfpNrslkSI5KGzb1h568zezGE1pyWmZj0ov2CrtnTmdo4iewlYBYA7wIbKILWEYGsLOzB/jo2UCvJKKTyRiNkiuVFV2YqI7+dWBDXMWXNWbIYI5K0fNcstSKmLR9s/dy09u87ACwOubL1gSoZ/wB2IjAIiE1bGAAAAAASUVORK5CYII="><img class="form__icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACvElEQVR4nO2ZTWsUQRCGn0P04pLE+3oQs1nBi/h1EPVg9GziX1GTP6CoR2MOGvHjP4gRsxtJBH+Cq7nHk27EGIyXtaWgGoaB+ejpWbsX9oUX9jBVXe9OVXVNN4wxRhRoA0tAF/gM7AOmJoov8dkBFnWt2nEO2Kgx6LL8CFysQ8AhYAX4G0CEUcraj4GJqiKOAu8DCjApbmhMzm8iRCqZAn4ADrsIWYkgaJPBZZfCDlkTpoAS29kyQmJMKZOitOhctAMH+AZoKtcKnm3lCVkKLKSZiOVYwbN38oR0RkjIep6Q7RqC6QPPgRuaqkeU8nseeAHsZtiuqQDh24J1vuQJ2fMQ8Bu4C0xSjCngntpUXW8vb4GqTndSLfE68Ez/tf3EQLgKXEu1+h2PdTNRVYTN7Vlgq4TNZqLrND3EZKJKOtk3cSUn97Nq6bLangcOQgqRmrBvwkVEUsyM+ngQSkhfi5aS6ZRFmbAF0xX+jFqESIu1hW08Oae+XoYQIvsE2p18hTxVXwshhEhdoC3WV4i0ZkE7hJCG2vyqQYj4EDRGXchP9TU56qnVC5la82qzWoOQJ+rrZgghMsWis5OvkKvq61XoDXHTQ4R8WtsN8UcIIUZHccFx4JvniPKwgn1tQg50FEcHwL6D7XfgktpeCD00mtQYP1PydFLS6YTayNfg14prZ8J4iJFR3GJOx46e7jPCT9qdbGHbN1FVhBnWp66kxn0t2iJMa038Gdan7raHY8tdnWJlADypE0BDfy9oi3XtTsb18CH0cZBx4Ls8IYsRBGhK8laekFYEARrHWS8T3QiCND6njBangUEEwZoMDspeK6B3diZSPsIBE5Gm2Jbr1Rt68RjTpU+35Gab+WaWA1/FDTSdKl9PJ3EKeB1ARAc4wxDQ0puidT3CqePgwVJ89XTHvl10tTbGGPwf/APThWw4L8JxcwAAAABJRU5ErkJggg=="></div><span class="form__span">ou use seu email para o registro</span>

                <input class="form__input" type="text" id="nome_completo" placeholder="Nome completo" name="nome_completo" required>

                <input class="form__input" type="text" id="nome_usuario" placeholder="Nome de usuário" name="nome_usuario" required>

                <input type="hidden" class="form__input" type="date" id="datadenascimento" placeholder="Data de nascimento" name="datadenascimento" value="0">

                <input class="form__input" type="text" id="cpf" placeholder="CPF" name="cpf" required>

                <label for="genero">Gênero</label>
                <select id="genero" placeholder="Gênero" name="genero" placeholder="Gênero">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>

                <input class="form__input" type="text" id="phone" placeholder="Número de telefone" name="phone" required>

                <input class="form__input" type="email" id="email" placeholder="Email" name="email" required>

                <input class="form__input" type="password" id="senha" placeholder="Senha" name="senha" required>

                <input type="hidden" id="tipo_funcionario" name="tipo_funcionario" value="0">

                <input type="hidden" class="form__input" type="text" id="cep" placeholder="" name="cep" value="0">

                <input type="hidden" class="form__input" type="text" id="cidade" placeholder=" " name="cidade" value="0">

                <input type="hidden" class="form__input" type="text" id="rua" placeholder=" " name="rua" value="0">

                <input type="hidden" class="form__input" type="text" id="numero" placeholder=" " name="numero" value="0">

                <input type="hidden" class="form__input" type="text" id="complemento" placeholder=" " name="complemento" value="0">

                <input type="hidden" class="form__input" type="time" id="hora_entrada" name="hora_entrada" value="0">

                <input type="hidden" class="form__input" type="time" id="hora_saida" name="hora_saida" value="0">

                <input type="hidden" class="form__input" type="text" id="carga_horaria" name="carga_horaria" value="0">

                <input type="hidden" class="form__input" type="text" id="remuneracao" name="remuneracao" value="0">

                <input type="hidden" class="form__input" type="date" id="data_contratacao" name="data_contratacao" value="0">
                <input type="hidden" class="form__input" type="hidden" name="cadastrar" value="cadastrar">

                <label for="foto_perfil">Foto de perfil</label>
                <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*">
                <button class="form__button button switch-btn" type='submit' name="cadastrar" value="cadastrar">CADASTRAR-SE</button>
            </form>
        </div>
        <div class="container b-container" id="b-container">
            <form class="form" id="b-form" method="post">
                <h2 class="form_title title">Iniciar uma sessão</h2>
                <!-- Campos de login -->
                <input class="form__input" type="email" id="email" placeholder="Email" name="email" required>
                <input class="form__input" type="password" id="senha" placeholder="Senha" name="senha" required>
                <button class="form__button button" type="submit" name="entrar" value="entrar">ENTRAR</button>
            </form>
        </div>
    </div>

    <script src="../JS/cadlog.js"></script>

    </div>


</body>

</html>