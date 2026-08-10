<?php
$titulo = 'Base64 — codificação, não criptografia';

$texto = 'Não protegido, apenas codificado';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$codificado = base64_encode($texto);
$decodificado = base64_decode($codificado);

require __DIR__ . '/includes/header.php';
?>

<h2>Base64: por que não é criptografia?</h2>
<p>
    <code>base64_encode()</code> e <code>base64_decode()</code> convertem
    dados binários em texto ASCII (e vice-versa). Não existe nenhuma
    <strong>chave secreta</strong> envolvida — qualquer pessoa com acesso ao
    texto codificado consegue decodificá-lo instantaneamente. Serve para
    transportar dados (por exemplo, anexar uma imagem dentro de um JSON),
    não para escondê-los.
</p>

<form method="post" action="base64.php">
    <label for="texto">Texto para codificar em Base64:</label>
    <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($texto) ?>">
    <button type="submit">Codificar / decodificar</button>
</form>

<div class="resultado">
    <table>
        <tbody>
            <tr>
                <th>Texto original</th>
                <td><?= htmlspecialchars($texto) ?></td>
            </tr>
            <tr>
                <th>Codificado em Base64</th>
                <td><code><?= htmlspecialchars($codificado) ?></code></td>
            </tr>
            <tr>
                <th>Decodificado de volta</th>
                <td><?= htmlspecialchars($decodificado) ?></td>
            </tr>
        </tbody>
    </table>
</div>

<h3>Código essencial</h3>
<pre>$codificado = base64_encode($texto);
$original = base64_decode($codificado);</pre>

<?php require __DIR__ . '/includes/footer.php'; ?>