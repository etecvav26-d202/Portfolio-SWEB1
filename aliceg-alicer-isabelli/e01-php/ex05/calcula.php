<?php


function fatorial($num) {
    $fat = 1;

    for ($i = 1; $i <= $num; $i++) {
        $fat *= $i;
    }

    return $fat;
}

$n1 = $_POST["n1"];
$n2 = $_POST["n2"];
$n3 = $_POST["n3"];
$n4 = $_POST["n4"];
$n5 = $_POST["n5"];

$f1 = fatorial($n1);
$f2 = fatorial($n2);
$f3 = fatorial($n3);
$f4 = fatorial($n4);
$f5 = fatorial($n5);

$soma = $f1 + $f2 + $f3 + $f4 + $f5;

echo "A soma dos fatoriais é: " . $soma;

?>