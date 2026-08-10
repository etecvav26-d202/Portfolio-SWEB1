<?php
$titulo = 'Base64 — codificação, não criptografia';

$texto = 'Isso não está protegido, só codificado!';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['texto']) && $_POST['texto'] !== '') {
    $texto = $_POST['texto'];
}

$codificado = base64_encode($texto);
$decodificado = base64_decode($codificado);

require __DIR__ . '/header.php';
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
