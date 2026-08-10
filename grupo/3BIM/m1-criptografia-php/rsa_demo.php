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

$recurso = openssl_pkey_new([
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA,
]);

if ($recurso === false) {
    $erro = 'Não foi possível gerar o par de chaves RSA nesta instalação do PHP.';
} else {
    openssl_pkey_export($recurso, $chavePrivadaPem);
    $detalhes = openssl_pkey_get_details($recurso);
    $chavePublicaPem = $detalhes['key'];

    // RSA "puro" só cifra blocos pequenos (limitado pelo tamanho da chave),
    // por isso é normalmente usado para cifrar uma chave simétrica, não o
    // dado inteiro. Aqui ciframos o texto diretamente só para demonstração.
    if (openssl_public_encrypt($texto, $textoCifrado, $chavePublicaPem)) {
        $textoCifradoBase64 = base64_encode($textoCifrado);
    } else {
        $erro = 'Falha ao cifrar (o texto pode ser grande demais para RSA-2048).';
    }

    if (!empty($textoCifrado)) {
        openssl_private_decrypt($textoCifrado, $textoDecifradoTmp, $chavePrivadaPem);
        $textoDecifrado = $textoDecifradoTmp ?? '';
    }
}

require __DIR__ . 'includes/header.php';
?>