<?php
$titulo = 'Início — Demonstração de Criptografia em PHP';
require __DIR__ . '/header.php';
?>

<h2>O que este site demonstra</h2>
<p>
    Este pequeno projeto mostra, de forma prática, os principais recursos de
    criptografia e hashing disponíveis nativamente no PHP (extensões
    <code>openssl</code> e <code>sodium</code>, além das funções
    <code>hash()</code> e <code>password_hash()</code>). Cada técnica foi
    separada em seu próprio arquivo PHP para facilitar o estudo do código.
</p>

<div class="grid">

    <div class="card">
        <h3>1. Hash (MD5 / SHA-1 / SHA-256 / SHA-512 / CRC32)</h3>
        <p>
            Funções de resumo (digest) unidirecionais: geram uma "impressão
            digital" do dado, mas <strong>não podem ser revertidas</strong>.
            Usadas para checksums e verificação de integridade — não devem
            ser usadas sozinhas para senhas.
        </p>
        <a href="hash_demo.php">Ver demonstração →</a>
    </div>

    <div class="card">
        <h3>2. Hash de senhas (bcrypt / Argon2id)</h3>
        <p>
            <code>password_hash()</code> e <code>password_verify()</code>,
            a forma correta e recomendada de armazenar senhas no PHP, com
            "salt" automático e custo ajustável.
        </p>
        <a href="password_demo.php">Ver demonstração →</a>
    </div>

    <div class="card">
        <h3>3. Criptografia simétrica — OpenSSL (AES-256-CBC)</h3>
        <p>
            Criptografia reversível: a mesma chave secreta é usada para
            cifrar e decifrar. Rápida e ideal para grandes volumes de dados.
        </p>
        <a href="openssl_demo.php">Ver demonstração →</a>
    </div>