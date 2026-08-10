<?php
$titulo = 'Sodium (libsodium) — criptografia moderna';

$texto = 'Mensagem protegida com libsodium';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$disponivel = extension_loaded('sodium');

$resultadoSimetrico = null;
$resultadoAssimetrico = null

if ($disponivel) {
    // ---------- 1) Simétrica autenticada: crypto_secretbox ----------
    $chaveSecreta = sodium_crypto_secretbox_keygen();
    $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
    $cifrado = sodium_crypto_secretbox($texto, $nonce, $chaveSecreta);
    $decifrado = sodium_crypto_secretbox_open($cifrado, $nonce, $chaveSecreta);

    $resultadoSimetrico = [
        'chave' => base64_encode($chaveSecreta),
        'nonce' => base64_encode($nonce),
        'cifrado' => base64_encode($cifrado),
        'decifrado' => $decifrado,
    ];

    // ---------- 2) Assimétrica: crypto_box (curva25519) ----------
    $parRemetente = sodium_crypto_box_keypair();
    $parDestinatario = sodium_crypto_box_keypair();

    $chavePrivadaRemetente = sodium_crypto_box_secretkey($parRemetente);
    $chavePublicaRemetente = sodium_crypto_box_publickey($parRemetente);
    $chavePrivadaDestinatario = sodium_crypto_box_secretkey($parDestinatario);
    $chavePublicaDestinatario = sodium_crypto_box_publickey($parDestinatario);

    $nonceBox = random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES);
    $chaveCompartilhadaEnvio = sodium_crypto_box_keypair_from_secretkey_and_publickey(
        $chavePrivadaRemetente,
        $chavePublicaDestinatario
    );
    $cifradoBox = sodium_crypto_box($texto, $nonceBox, $chaveCompartilhadaEnvio);

    $chaveCompartilhadaRecebimento = sodium_crypto_box_keypair_from_secretkey_and_publickey(
        $chavePrivadaDestinatario,
        $chavePublicaRemetente
    );
    $decifradoBox = sodium_crypto_box_open($cifradoBox, $nonceBox, $chaveCompartilhadaRecebimento);

    $resultadoAssimetrico = [
        'publica_remetente' => base64_encode($chavePublicaRemetente),
        'publica_destinatario' => base64_encode($chavePublicaDestinatario),
        'cifrado' => base64_encode($cifradoBox),
        'decifrado' => $decifradoBox,
    ];
}