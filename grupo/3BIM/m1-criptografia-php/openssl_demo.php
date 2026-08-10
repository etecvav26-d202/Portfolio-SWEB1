<?php
$titulo = 'OpenSSL — Criptografia simétrica (AES-256-CBC)';

$texto = 'Mensagem secreta enviada via AES';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$metodo = 'aes-256-cbc';