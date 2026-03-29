<?php

function media($v) {
    $soma = array_sum($v);
    $quantidade = count($v);
    if ($quantidade == 0) {
        return 0;
    }
    return $soma / $quantidade;
}
$entrada = $_POST["numeros"];

$numeros = explode(",", $entrada);

$valores = array_map('floatval', $numeros);

$resultado = media($valores);

echo "<h2>Média: $resultado</h2>";
echo '<br><a href="index.php">Voltar</a>';

?>