<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão Usuário</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
require_once "funcoes.php";

if(isset($_GET["codigo"])){

    if(excluirUsuario($_GET["codigo"])){
        ?>
        <div class="container">
        <div class="alert success" id="alert">
        Usuário excluído com sucesso!
        </div>
        <a class="button" href="listar.php">Voltar</a>
        </div>
        <?php
    }
}
?>
</body>
</html>