<?php

$n = $_POST["n"];
echo "<h2>Resultado:</h2>";
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
echo '<br><a href="index.php">Voltar</a>';

?>