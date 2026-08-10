<?php
$titulo = 'Hash — MD5, SHA e CRC32';

$texto = 'PHP é divertido';
$algoritmos = ['md5', 'sha1', 'sha256', 'sha512', 'crc32b'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

require __DIR__ . 'includes/header.php';
?>