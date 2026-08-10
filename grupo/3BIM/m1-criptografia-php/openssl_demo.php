<?php
$titulo = 'OpenSSL — Criptografia simétrica (AES-256-CBC)';

$texto = 'Mensagem secreta enviada via AES';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$metodo = 'aes-256-cbc';

$senha = 'chave-secreta-de-demonstracao';
$chave = hash('sha256', $senha, true); // 32 bytes, exigido pelo AES-256

$tamanhoIv = openssl_cipher_iv_length($metodo);
$iv = openssl_random_pseudo_bytes($tamanhoIv);

$textoCifrado = openssl_encrypt($texto, $metodo, $chave, OPENSSL_RAW_DATA, $iv);