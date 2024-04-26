<?php
include_once 'C:\xampp\htdocs\grupo2\app\Controller\controllerusuarios.php'
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Usuário</title>
</head>

<body>
    <fieldset>
        <legend>
            <h1>Lista de Usuário</h1>
        </legend>
        <table border="1">
            <thead>
                <tr>
                    <th>id do usuário</th>
                    <th>Nome completo</th>
                    <th>Nome usuario</th>
                    <th>Data de Nascimento</th>
                    <th>CPF</th>
                    <th>Gênero</th>
                    <th>Número de Telefone</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Hora de chegada</th>
                    <th>Hora de saída</th>
                    <th>Carga horária</th>
                    <th>Remuneração</th>
                    <th>Data de Contratação</th>
                    <th>Foto de perfil</th>

                    $cep, $cidade, $rua, $numero, $complemento, $hora_entrada, $hora_saida, $carga_horaria, $remuneracao, $data_contratacao, $foto_perfil)
                </tr>
            </thead>
            <?php foreach ($users as $user) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $user['id_user']; ?></td>
                        <td><?php echo $user['nome_completo']; ?></td>
                        <td><?php echo $user['nome_usuario']; ?></td>
                        <td><?php echo $user['datadenascimento']; ?></td>
                        <td><?php echo $user['cpf']; ?></td>
                        <td><?php echo $user['genero']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['senha']; ?></td>
                        <td><?php echo $user['tipo_funcionario,']; ?></td>
                        <td><?php echo $user['cep']; ?></td>
                        <td><?php echo $user['cidade']; ?></td>
                        <td><?php echo $user['rua']; ?></td>
                        <td><?php echo $user['numero']; ?></td>
                        <td><?php echo $user['complemento']; ?></td>
                        <td><?php echo $user['hora_entrada']; ?></td>
                        <td><?php echo $user['hora_saida']; ?></td>
                        <td><?php echo $user['carga_horaria']; ?></td>
                        <td><?php echo $user['remuneracao']; ?></td>
                        <td><?php echo $user['data_contratacao']; ?></td>
                        <td><img src="<?= "../../grupo2/app/public/upload/" . $user['foto_perfil']; ?>" alt="foto perfil" width="100px"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
        </table>
    </fieldset>
</body>

</html>