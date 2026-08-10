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

<h2>Criptografia assimétrica com RSA</h2>
<p>
    No modelo assimétrico existem duas chaves matematicamente ligadas: a
    <strong>chave pública</strong> (pode ser distribuída livremente) e a
    <strong>chave privada</strong> (deve ser mantida em segredo). O que é
    cifrado com a pública só é decifrado com a privada correspondente.
</p>

<form method="post" action="rsa_demo.php">
    <label for="texto">Texto curto para cifrar com a chave pública:</label>
    <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($texto) ?>">
    <button type="submit">Gerar par de chaves e cifrar</button>
</form>