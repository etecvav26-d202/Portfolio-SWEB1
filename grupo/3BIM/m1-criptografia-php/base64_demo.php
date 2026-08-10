<?php
$titulo = 'Base64 — codificação, não criptografia';

$texto = 'Isso não está protegido, só codificado!';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$codificado = base64_encode($texto);
$decodificado = base64_decode($codificado);

require __DIR__ . '/header.php';
?>