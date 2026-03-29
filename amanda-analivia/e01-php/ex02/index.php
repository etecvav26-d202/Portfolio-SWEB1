<!--
Data: 30/03/2026
Autor: Amanda Neves Oliveira e Ana Lívia Takeyama Romanato - 2°D
Objetivo: Aplicar fórmulas matemáticas e decisões condicionais para converter temperaturas entre Celsius e Fahrenheit.

Exercício 2 - Conversão de Temperatura
Faça um programa que leia um caractere "F" ou "C", indicando se o valor informado está em Fahrenheit ou Celsius.
Depois, o programa deve converter para outra unidade.

Fórmula: C = 5/9 × (F − 32)
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 2 - Conversão de Temperatura</title>
</head>
<body>
<h1> Conversão de Temperatura<h1>
<form action="calcula.php" method="post">
   <label> Digite a temperatura: </label>
    <input type="number" name="temp" required>
    <br><br>
    <label> Informe a unidade ("F" para Fahrenheit ou "C" para Celsius): </label>
     <input type="text" name="tipo" maxlength="1" required>
    <br><br>
    <button type="submit">Verificar</button>
</form>

</body>
</html>