<!--
Data: 30/03/2026
Autor: Amanda Neves Oliveira e Ana Lívia Takeyama Romanato - 2°D
Objetivo: Trabalhar com vetores e classificar dados com base em uma condição.

Exercício 7 - Separar Positivos e Negativos
Leia 8 números inteiros e separados em dois vetores:
- Um vetor com números positivos
- Um vetor com números negativos
-->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Exercício 7 - Separar Positivos e Negativos</title>
    </head>
    <body>
        <h1>Positivos e Negativos<h1>
            <form action="calcula.php" method="POST">
                <label> Digite 8 números inteiros: </label>
                <br><br>

                 <?php
    for ($i = 1; $i <= 8; $i++) {
        echo "Número $i: <input type='number' name='n[]' required><br><br>";
    }
    ?>

    <button type="submit">Separar</button>
</form>

    </body>
</html>