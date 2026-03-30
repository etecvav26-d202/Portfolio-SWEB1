<?php

function soma($n){
    $total = 0;
    
    for ( $i = 0; $i<= $n; $i++) {
            $total += $i;
}
return ($total)
} 
$n = $_POST {'n'};

$resultado = soma($n);
echo "A soma de 0 até $n é: " . $resultado;

?>

