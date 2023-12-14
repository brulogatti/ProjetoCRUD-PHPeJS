<?php
require_once "funcoes.php";
if(isset($_GET["codigo"])){
    $codigo = $_GET["codigo"];
    $usuario = buscarUsuario($codigo);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Registrar</h1>
        <?php
        if(!isset($_GET["codigo"])){
        ?>
        <form action="listar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <div id="erro-nome" class="erro"></div>
            <br>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" required>
            <div id="erro-email" class="erro"></div>
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" required>
            <div id="erro-telefone" class="erro"></div>
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" required>
            <div id="erro-endereco" class="erro"></div>
            <br>
            <input type="submit" id="enviar" value="Enviar">
        </form>
        <?php
        }else{
            echo '<form action="editar.php?codigo='.$codigo.'" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="'.$usuario["nome"].'" required>
            <div id="erro-nome" class="erro"></div>
            <br>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" value="'.$usuario["email"].'" required>
            <div id="erro-email" class="erro"></div>
            <br>
            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="'.$usuario["telefone"].'" required>
            <div id="erro-telefone" class="erro"></div>
            <br>
            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="'.$usuario["endereco"].'" required>
            <div id="erro-endereco" class="erro"></div>
            <br>
            <input type="submit" id="enviar" value="Enviar">
            </form>';
        }
        ?>
    </div>

    <script src="js/script.js"></script>
</body>
</html>