<?php
include_once '../../MVC/Controller/UserController.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/gestaorh.css">

    <head>
        <title>Lista de Usuário</title>
    </head>

<body>

    <h1>Lista de Usuário</h1>


    <div class="container">
        <div class="row header">
            <th class="column">id do usuário</th>
            <th class="column">Nome completo</th>
            <th class="column">Nome usuario</th>
            <th class="column">Data de Nascimento</th>
            <th class="column">CPF</th>
            <th class="column">Gênero</th>
            <th class="column">Número de Telefone</th>
            <th class="column">Email</th>
            <th class="column">Senha</th>
            <th class="column">CEP</th>
            <th class="column">Cidade</th>
            <th class="column">Rua</th>
            <th class="column">Número</th>
            <th class="column">Complemento</th>
            <th class="column">Hora de chegada</th>
            <th class="column">Hora de saída</th>
            <th class="column">Carga horária</th>
            <th class="column">Remuneração</th>
            <th class="column">Data de Contratação</th>
            <th class="column">Foto de perfil</th>
            </tr>
            </thead>
            <?php foreach ($users as $user) : ?>
                <div class="row">
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
                    <div>
                    </tbody>
                    </table>
                    </fieldset>
</body>

</html>

