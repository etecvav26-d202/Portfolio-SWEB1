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

require __DIR__ . '/includes/header.php';
?>

<h2>Libsodium — criptografia moderna e autenticada</h2>
<p>
    A extensão <code>sodium</code> é a recomendação atual para novos
    projetos: API enxuta, escolhas seguras por padrão e proteção contra
    adulteração dos dados (autenticação), algo que o AES-CBC "puro" não
    oferece sozinho.
</p>


<?php if (!$disponivel): ?>
<?php else: ?>

    <form method="post" action="sodium_demo.php">
        <label for="texto">Texto para cifrar com Sodium:</label>
        <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($texto) ?>">
        <button type="submit">Cifrar (simétrico e assimétrico)</button>
    </form>

    <h3>1. Simétrica autenticada — <code>crypto_secretbox</code></h3>
    <div class="resultado">
        <table>
            <tbody>
                <tr><th>Chave (base64)</th><td><code><?= htmlspecialchars($resultadoSimetrico['chave']) ?></code></td></tr>
                <tr><th>Nonce (base64)</th><td><code><?= htmlspecialchars($resultadoSimetrico['nonce']) ?></code></td></tr>
                <tr><th>Cifrado (base64)</th><td><code><?= htmlspecialchars($resultadoSimetrico['cifrado']) ?></code></td></tr>
                <tr><th>Decifrado</th><td><?= htmlspecialchars($resultadoSimetrico['decifrado']) ?></td></tr>
            </tbody>
        </table>
    </div>

    <h3>2. Assimétrica — <code>crypto_box</code> (Curve25519)</h3>
    <div class="resultado">
        <table>
            <tbody>
                <tr><th>Chave pública do remetente</th><td><code><?= htmlspecialchars($resultadoAssimetrico['publica_remetente']) ?></code></td></tr>
                <tr><th>Chave pública do destinatário</th><td><code><?= htmlspecialchars($resultadoAssimetrico['publica_destinatario']) ?></code></td></tr>
                <tr><th>Cifrado (base64)</th><td><code><?= htmlspecialchars($resultadoAssimetrico['cifrado']) ?></code></td></tr>
                <tr><th>Decifrado pelo destinatário</th><td><?= htmlspecialchars($resultadoAssimetrico['decifrado']) ?></td></tr>
            </tbody>
        </table>
    </div>

    <h3>Código essencial</h3>
    <pre>
$chave = sodium_crypto_secretbox_keygen();
$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
$cifrado = sodium_crypto_secretbox($texto, $nonce, $chave);
$texto = sodium_crypto_secretbox_open($cifrado, $nonce, $chave);

$par = sodium_crypto_box_keypair();
$cifrado = sodium_crypto_box($texto, $nonce, $chaveCompartilhada);</pre>

<?php endif; ?>

<?php require __DIR__ . '/includes/footer.php'; ?>
