<?php

$numero1 = $_POST["numero1"];
$numero2 = $_POST["numero2"];
$operador = $_POST["operador"];

switch ($operador) {
    case "+":
        $resultado = $numero1 + $numero2;
        break;
    case "-":
        $resultado = $numero1 - $numero2;
        break;
    case "*":
        $resultado = $numero1 * $numero2;
        break;
    case "/":
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
        } else {
            echo "Erro: divisão por zero.";
            exit;
        }
        break;
    default:
        echo "Operador inválido.";
        exit;
}
echo "<h2>Resultado: $resultado</h2>";
echo '<br><a href="index.php">Voltar</a>';
?>