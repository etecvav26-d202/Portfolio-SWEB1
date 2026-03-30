<!--
Data: 30/03/2026
Autor:  Alice Rasmussen Rezende Alves, Alice Gimenez Siqueira e Isabelli Dias da Silva - 2°D
Objetivo: Utilizar estruturas de repetição para gerar padrões numéricos em forma de sequência crescente.

Exercício 4 - Triângulo Numérico
Leia um número n e imprima n linhas no seguinte formato (exemplo para n = 6):

1
1 2
1 2 3
1 2 3 4
1 2 3 4 5
1 2 3 4 5 6
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Triângulo Numérico</title>
</head>
<body>
<h1>Triângulo Numérico</h1>
<form action="calcula.php" method="post">
    <label>Digite um número (n):</label>
    <input type="number" name="n" min="1" required><br><br>

    <button type="submit">Gerar</button>
</form>

</body>
</html>