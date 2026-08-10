<?php
$titulo = 'RSA — Criptografia assimétrica';

$texto = 'Segredo apenas para quem tem a chave privada';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$erro = null;
$chavePublicaPem = '';
$chavePrivadaPem = '';
$textoCifradoBase64 = '';
$textoDecifrado = '';