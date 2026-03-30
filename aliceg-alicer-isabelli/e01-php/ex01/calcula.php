<?php

if (isset($_POST['numero'])) {

    $numero = $_POST['numero'];

    if ($numero >= 100 && $numero <= 200) {
        echo "O número está entre 100 e 200.";
    } else {
        echo "O número não está entre 100 e 200.";
    }

} else {
    echo "Nenhum número foi informado.";
}

?>
