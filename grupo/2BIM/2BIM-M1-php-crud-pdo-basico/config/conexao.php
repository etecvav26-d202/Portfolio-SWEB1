<?php

$servidor = "localhost";
$banco = "farmavav";
$usuario = "root";
$senha = "";

try {

    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8",
        $usuario,
        $senha
    );

} catch(PDOException $erro){
    echo "Erro na conexão do servidor: " . $erro->getMessage();
}

?>