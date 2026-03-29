<?php

$temp = $_POST['temp'];
$tipo = strtoupper($_POST['tipo']);

if ($tipo == "F") {
    // Fahrenheit para Celsius
    $resultado = (5/9) * ($temp - 32);
    echo "Temperatura em Celsius: " . $resultado;
}
elseif ($tipo == "C") {
    // Celsius para Fahrenheit
    $resultado = ($temp * 9/5) + 32;
    echo "Temperatura em Fahrenheit: " . $resultado;
}
else {
    echo "Digite apenas F ou C!";
}
echo '<br><a href="index.php">Voltar</a>';
?>