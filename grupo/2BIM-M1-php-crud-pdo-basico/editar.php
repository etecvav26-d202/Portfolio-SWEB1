<?php
require_once 'config/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produtos
    
    SET 
    nome = :nome,
    fabricante = :fabricante,
    preco = :preco,
    estoque = :estoque
    
    WHERE id = :id;"

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nome" => $nome,
        ":fabricante" => $fabricante,
        ":preco" => $preco,
        ":estoque" => $estoque,
        ":id" => $id
    ]);

    header("Location: index.php");
}

