<?php

if (isset($_POST['n']) && is_numeric($_POST['n'])) {
    $n = (int) $_POST['n'];

function soma($n){
    $total = 0;
    
    for ( $i = 0; $i<= $n; $i++) {
            $total += $i;
}
return ($total);
}
$resultado = soma($n);
echo "A soma de 0 até $n é: " . $resultado;
echo '<br><a href="index.php">Voltar</a>';
} else { 
    echo "Informe um número válido.";
    echo '<br><a href="index.php">Voltar</a>';
}

?>

