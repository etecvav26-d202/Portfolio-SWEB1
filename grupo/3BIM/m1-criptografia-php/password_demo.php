<?php
$titulo = 'Hash de senhas — bcrypt e Argon2id';

$senha = 'MinhaSenh@123';
$senhaConferir = '';
$resultadoConferencia = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['senha'])) {
        $senha = $_POST['senha'];
    }
    if (isset($_POST['senha_conferir'])) {
        $senhaConferir = $_POST['senha_conferir'];
    }
}

$hashBcrypt = password_hash($senha, PASSWORD_BCRYPT);
$hashArgon2id = defined('PASSWORD_ARGON2ID')
    ? password_hash($senha, PASSWORD_ARGON2ID)
    : null;

// Se o usuário preencheu o campo de conferência, valida contra o hash bcrypt gerado.
if ($senhaConferir !== '') {
    $resultadoConferencia = password_verify($senhaConferir, $hashBcrypt);
}

require __DIR__ . 'includes/header.php';
?>