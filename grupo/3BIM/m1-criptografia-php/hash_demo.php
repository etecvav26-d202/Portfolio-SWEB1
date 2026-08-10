<?php
$titulo = 'Hash — MD5, SHA e CRC32';

$texto = 'PHP é divertido';
$algoritmos = ['md5', 'sha1', 'sha256', 'sha512', 'crc32b'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

require __DIR__ . 'includes/header.php';
?>

<h2>Hash (funções de resumo criptográfico)</h2>
<p>
    Um hash transforma qualquer entrada em uma saída de tamanho fixo. É uma
    via de mão única: não existe função "desfazer_hash()". Pequenas
    mudanças na entrada geram saídas completamente diferentes (efeito
    avalanche).
</p>