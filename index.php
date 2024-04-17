<?php
require_once 'C:\xampp\htdocs\gestao_bikes\gestao_bikes\confg.php\confg.php';

// Classe Empresa
class Empresa {
    // propriedades e métodos aqui...
}

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // cria uma nova instância de Empresa
    $empresa = new Empresa();
    // Define as propriedades da empresa com os dados do formulário
    // $empresa->id_empresa = $_POST['id_empresa']; // Se id_empresa for uma propriedade a ser definida
    // Define as outras propriedades...
    // Chama o método para cadastrar a empresa
    // $empresa->cadastrar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#cep').blur(function(){
                var cep = $(this).val();
                $.ajax({
                    url: 'busca_cep.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {cep: cep},
                    success: function(data){
                        $('#estado').val(data.estado);
                        $('#rua').val(data.rua);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h2>Cadastro de Empresa</h2>
    <form action="cadastrar_empresa.php" method="post">
        <label for="nome">Nome da Empresa:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="servicos">Serviços:</label><br>
        <input type="text" id="servicos" name="servicos" required><br>

        <label for="cnpj">CNPJ:</label><br>
        <input type="text" id="cnpj" name="cnpj" required><br>

        <label for="cep">CEP:</label><br>
        <input type="text" id="cep" name="cep" required><br>

        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado" readonly><br>

        <label for="rua">Rua:</label><br>
        <input type="text" id="rua" name="rua" readonly><br>

        <label for="numero">Número:</label><br>
        <input type="text" id="numero" name="numero" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>

<?php
require_once 'C:\xampp\htdocs\gestao_bikes\gestao_bikes\confg.php\confg.php';

$cep = $_POST['cep'];

$sql = "SELECT estado, rua FROM tabela_de_cep WHERE cep = '$cep'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array('estado' => $row['estado'], 'rua' => $row['rua']);
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'CEP não encontrado'));
}
?>

