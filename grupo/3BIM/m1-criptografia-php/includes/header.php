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
        <a href="hash.php">Hash</a>
        <a href="password.php">Senhas</a>
        <a href="openssl.php">OpenSSL (AES)</a>
        <a href="rsa.php">RSA</a>
        <a href="sodium.php">Sodium</a>
        <a href="base64.php">Base64</a>
    </nav>
</header>
<main class="conteudo">