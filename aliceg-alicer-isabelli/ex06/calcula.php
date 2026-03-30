<?php

$n = $_POST["n"];

$a = 0;
$b = 1;

echo "Sequência de Fibonacci:<br><br>";

if ($n <= 0) {
    echo "Digite um número maior que 0.";
} else {

    for ($i = 1; $i <= $n; $i++) {
        echo $a . " ";

        $prox = $a + $b; 
        $a = $b;  
        $b = $prox;
    }
}

?>