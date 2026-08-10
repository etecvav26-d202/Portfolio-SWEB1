<?php
$titulo = 'OpenSSL — Criptografia simétrica (AES-256-CBC)';

$texto = 'Mensagem secreta enviada via AES';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$metodo = 'aes-256-cbc';

$senha = 'chave-secreta-de-demonstracao';
$chave = hash('sha256', $senha, true);

$tamanhoIv = openssl_cipher_iv_length($metodo);
$iv = openssl_random_pseudo_bytes($tamanhoIv);

$textoCifrado = openssl_encrypt($texto, $metodo, $chave, OPENSSL_RAW_DATA, $iv);

$pacoteTransporte = base64_encode($iv . $textoCifrado);

$pacoteBruto = base64_decode($pacoteTransporte);
$ivRecebido = substr($pacoteBruto, 0, $tamanhoIv);
$cifradoRecebido = substr($pacoteBruto, $tamanhoIv);
$textoDecifrado = openssl_decrypt($cifradoRecebido, $metodo, $chave, OPENSSL_RAW_DATA, $ivRecebido);

require __DIR__ . '/includes/header.php';
?>

<h2>Criptografia simétrica com OpenSSL</h2>
<p>
    Na criptografia simétrica, a <strong>mesma chave</strong> cifra e
    decifra os dados. É rápida e ótima para grandes volumes, mas exige que
    as duas partes compartilhem a chave secreta com segurança.
</p>

<form method="post" action="openssl.php">
    <label for="texto">Texto para cifrar com AES-256-CBC:</label>
    <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($texto) ?>">
    <button type="submit">Cifrar e decifrar</button>
</form>

<div class="resultado">
    <table>
        <tbody>
            <tr>
                <th>Texto original</th>
                <td><?= htmlspecialchars($texto) ?></td>
            </tr>
            <tr>
                <th>IV (aleatório, em base64)</th>
                <td><code><?= htmlspecialchars(base64_encode($iv)) ?></code></td>
            </tr>
            <tr>
                <th>Pacote cifrado (IV + dados, em base64)</th>
                <td><code><?= htmlspecialchars($pacoteTransporte) ?></code></td>
            </tr>
            <tr>
                <th>Texto decifrado (prova de que funciona)</th>
                <td><?= htmlspecialchars($textoDecifrado) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Código essencial</h3>
<pre>$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$cifrado = openssl_encrypt($texto, 'aes-256-cbc', $chave, OPENSSL_RAW_DATA, $iv);
$decifrado = openssl_decrypt($cifrado, 'aes-256-cbc', $chave, OPENSSL_RAW_DATA, $iv);</pre>

<h3>Métodos de cifra disponíveis nesta instalação</h3>
<pre><?= htmlspecialchars(implode(', ', openssl_get_cipher_methods())) ?></pre>

<?php require __DIR__ . '/includes/footer.php'; ?>