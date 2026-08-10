<?php
$titulo = 'Hash — MD5, SHA e CRC32';

$texto = 'PHP é divertido';
$algoritmos = ['md5', 'sha1', 'sha256', 'sha512', 'crc32b'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

require __DIR__ . '/includes/header.php';
?>

<h2>Hash (funções de resumo criptográfico)</h2>
<p>
    Um hash transforma qualquer entrada em uma saída de tamanho fixo. É uma
    via de mão única: não existe função "desfazer_hash()". Pequenas
    mudanças na entrada geram saídas completamente diferentes (efeito
    avalanche).
</p>

<form method="post" action="hash.php">
    <label for="texto">Texto para gerar o hash:</label>
    <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($texto) ?>">
    <button type="submit">Gerar hashes</button>
</form>

<div class="resultado">
    <table>
        <thead>
            <tr>
                <th>Algoritmo</th>
                <th>Hash gerado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($algoritmos as $algoritmo): ?>
                <tr>
                    <td><code><?= htmlspecialchars($algoritmo) ?></code></td>
                    <td><code><?= htmlspecialchars(hash($algoritmo, $texto)) ?></code></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h3>Todos os algoritmos suportados por esta instalação do PHP</h3>
<p>A função <code>hash_algos()</code> lista tudo o que está disponível:</p>
<pre><?= htmlspecialchars(implode(', ', hash_algos())) ?></pre>

<?php require __DIR__ . '/includes/footer.php'; ?>