<?php
function cadastrarUsuario(){
    $codigo = obterCodigo();

    $usuario = array(
        "nome"=>$_POST["nome"],
        "email"=>$_POST["email"],
        "telefone"=>$_POST["telefone"],
        "endereco"=>$_POST["endereco"],
        "codigo"=>$codigo
    );

    if(file_exists("json/usuarios.json")){
        $dados = file_get_contents("json/usuarios.json");
        $dados = json_decode($dados, true);
    }

    $dados[]=$usuario;
    $dados = json_encode($dados, JSON_PRETTY_PRINT);
    file_put_contents("json/usuarios.json", $dados);

    atualizarCodigo($codigo);

    echo "<h2>Usuário Cadastrado com Sucesso</h2>";
    echo "<p><a class='button' href='crud.php'>Voltar</a></p><br>";
    echo "<p><a class='button' href='listar.php'>Listar Usuários</a></p>";
}

function obterCodigo(){
    if(file_exists("json/codigos.json")){
        $codigo = file_get_contents("json/codigos.json");
        $codigo = json_decode($codigo);
    }else{
        $codigo = 1;
    }
    return $codigo;
}

function atualizarCodigo($codigo){
    $codigo = $codigo + 1;
    $codigo = json_encode($codigo);
    file_put_contents("json/codigos.json", $codigo);
}

function excluirUsuario($codigo){
    $result=false;
    if(file_exists("json/usuarios.json")){
        $dados = file_get_contents("json/usuarios.json");
        $dados = json_decode($dados,true);

        for ($i=0; $i < sizeof($dados); $i++) { 
            if($dados[$i]["codigo"] == $codigo){
                unset($dados[$i]);
            }
        }

        $dadosModificados = array();
        foreach ($dados as $dado) {
            $dadosModificados[]=$dado;
        }

        $dadosModificados = json_encode($dadosModificados,JSON_PRETTY_PRINT);
        file_put_contents("json/usuarios.json",$dadosModificados);

        $result=true;
    }
    return $result;

}

function editarUsuario($codigo){
    $result=false;
    if(file_exists("json/usuarios.json")){
        $dados = file_get_contents("json/usuarios.json");
        $dados = json_decode($dados,true);

        for ($i=0; $i < sizeof($dados); $i++) { 
            if($dados[$i]["codigo"] == $codigo){
                $dados[$i]["nome"]=$_POST["nome"];
                $dados[$i]["email"]=$_POST["email"];
                $dados[$i]["endereco"]=$_POST["endereco"];
                $dados[$i]["telefone"]=$_POST["telefone"];
            }
        }

        $dados = json_encode($dados,JSON_PRETTY_PRINT);
        file_put_contents("json/usuarios.json",$dados);

        $result=true;
    }
    return $result;
}

function buscarUsuario($codigo){
    if(file_exists("json/usuarios.json")){
        $dados = file_get_contents("json/usuarios.json");
        $dados = json_decode($dados,true);

        foreach ($dados as $dado) {
            if($dado["codigo"]==$codigo){
                $usuario=array(
                    "nome"=>$dado["nome"],
                    "email"=>$dado["email"],
                    "endereco"=>$dado["endereco"],
                    "telefone"=>$dado["telefone"]
                );
            }
        }
    }
    return $usuario;
}

?>
