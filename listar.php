<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/functions.js"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once "funcoes.php";

            if(isset($_POST["telefone"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["endereco"])){
            cadastrarUsuario();
            }else{
                ?>
                <table id="tabela-usuarios">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody></tbody>
                </table>
                <script>carregarDados()</script>
                <?php
            }   
        ?>
        <br>
        <a class="button" href="crud.php">Cadastrar Usuário</a>
    </div>
</body>
</html>