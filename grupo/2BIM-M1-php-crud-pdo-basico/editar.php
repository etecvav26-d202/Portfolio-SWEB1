<?php

$servidor = "localhost";
$banco = "farmavav";
$usuario = "root";
$senha = "";

try {

    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );

    echo "Conexão realizada com sucesso!";

} catch(PDOException $erro){
    echo "Erro na conexão do servidor: " . $erro->getMessage();
}

