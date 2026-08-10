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