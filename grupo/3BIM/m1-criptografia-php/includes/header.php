<?php
$titulo = $titulo ?? 'Demonstração de Criptografia em PHP';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header class="topo">
    <h1> Criptografia em PHP</h1>
    <nav>
        <a href="index.php">Início</a>
        <a href="hash_demo.php">Hash</a>
        <a href="password_demo.php">Senhas</a>
        <a href="openssl_demo.php">OpenSSL (AES)</a>
        <a href="rsa_demo.php">RSA</a>
        <a href="sodium_demo.php">Sodium</a>
        <a href="base64_demo.php">Base64</a>
    </nav>
</header>
<main class="conteudo">