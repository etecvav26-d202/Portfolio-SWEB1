<?php
$titulo = 'Sodium (libsodium) — criptografia moderna';

$texto = 'Mensagem protegida com libsodium';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$disponivel = extension_loaded('sodium');

$resultadoSimetrico = null;
$resultadoAssimetrico = null