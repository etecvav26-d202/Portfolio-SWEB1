<?php

$numeros = $_POST["n"];

$positivos = [];
$negativos = [];

foreach ($numeros as $num) {
    if ($num >= 0) {
        $positivos[] = $num;
    } else {
        $negativos[] = $num;
    }
}

echo "<h3>Vetor de Números Positivos:</h3>";
foreach ($positivos as $p) {
    echo $p . " ";
}

echo "<h3>Vetor de Números Negativos:</h3>";
foreach ($negativos as $n) {
    echo $n . " ";
}
echo '<br><a href="index.php">Voltar</a>';
?>