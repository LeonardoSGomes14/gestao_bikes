<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      /* Reset de estilos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Estilo do corpo da página */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

/* Estilo do cabeçalho */
.comeco {
    background-color: #333;
    color: #fff;
    padding: 20px;
}

.titulo {
    text-align: center;
}

/* Estilo do formulário */
.text-cadastro {
    font-size: 20px;
    font-weight: bold;
    margin-top: 20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button[type="button"],
form button[type="submit"] {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

form button[type="button"]:hover,
form button[type="submit"]:hover {
    background-color: #555;
}

/* Estilo do rodapé */
.rodape {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
    margin-top: 20px;
}

.rodape a {
    color: #fff;
    text-decoration: none;
}

.rodape a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="comeco">
        <h1 class="titulo">Sistema De Gestão ERP+controle de empresas e de pessoas</h1>
      
    </div>

    <?php
    require_once 'C:\xampp\htdocs\gestao_bikes\GB\config\config.php';

    $id_empresa = $_GET['id'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM cadastro_empresa WHERE id_empresa = ?");
        $stmt->execute([$id_empresa]);
        $empresa = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$empresa) {
            echo "<p>Empresa não encontrada.</p>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<p>Erro ao buscar empresa: " . $e->getMessage() . "</p>";
        exit;
    }
    ?>

    <div class="text-cadastro">Editar Empresa</div>
    <form id="formEmpresa" action="atualizar_empresa.php" method="post">
        <input type="hidden" name="id_empresa" value="<?php echo htmlspecialchars($empresa['id_empresa']); ?>">

        <label for="nome">Nome da Empresa:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($empresa['nome']); ?>" required>

        <label for="servicos">Serviços:</label>
        <input type="text" id="servicos" name="servicos" value="<?php echo htmlspecialchars($empresa['servicos']); ?>" required>

        <label for="cnpj">CNPJ:</label>
        <input type="text" id="cnpj" name="cnpj" value="<?php echo htmlspecialchars($empresa['cnpj']); ?>" required>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($empresa['cep']); ?>" required>
        <button type="button" onclick="consultarCEP()">Consultar</button>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" value="<?php echo htmlspecialchars($empresa['estado']); ?>" readonly>

        <label for="rua">Rua:</label>
        <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($empresa['rua']); ?>" readonly>

        <label for="numero">Número:</label>
        <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($empresa['numero']); ?>" required>

        <button type="submit">Atualizar</button>
    </form>

    <div class="rodape">
        <a class="entra" href="controle_empresa.php">Voltar</a>
    </div>

    <script>
        function consultarCEP() {
            var cep = document.getElementById('cep').value;
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                    } else {
                        document.getElementById('estado').value = data.uf;
                        document.getElementById('rua').value = data.logradouro;
                    }
                })
                .catch(error => {
                    console.error('Erro ao consultar o CEP:', error);
                    alert('Erro ao consultar o CEP.');
                });
        }
    </script>