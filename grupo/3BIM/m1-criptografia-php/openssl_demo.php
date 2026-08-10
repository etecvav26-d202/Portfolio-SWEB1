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

$pacoteTransporte = base64_encode($iv . $textoCifrado);

$pacoteBruto = base64_decode($pacoteTransporte);
$ivRecebido = substr($pacoteBruto, 0, $tamanhoIv);
$cifradoRecebido = substr($pacoteBruto, $tamanhoIv);
$textoDecifrado = openssl_decrypt($cifradoRecebido, $metodo, $chave, OPENSSL_RAW_DATA, $ivRecebido);

require __DIR__ . 'includes/header.php';
?>

<h2>Criptografia simétrica com OpenSSL</h2>
<p>
    Na criptografia simétrica, a <strong>mesma chave</strong> cifra e
    decifra os dados. É rápida e ótima para grandes volumes, mas exige que
    as duas partes compartilhem a chave secreta com segurança.
</p>