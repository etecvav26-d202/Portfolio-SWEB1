<!--
Data: 30/03/2026
Autor: Amanda Neves Oliveira e Ana Lívia Takeyama Romanato - 2°D
Objetivo: Realizar operações matemáticas básicas com base em um operador escolhido pelo usuário.

Exercício 3 - Calculadora Aritmética
Faça um programa que leia dois números e um operador ("+", "-", "*" ou "/").
O programa deve mostrar o resultado da operação.
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 3 - Calculadora Aritmética</title>
</head>
<body>
<h1>Calculadora Aritmética</h1>
<form action="calcula.php" method="post">
    <label>Digite o primeiro número:</label>
    <input type="number" name="numero1" step="any" required><br><br>

    <label>Digite o segundo número:</label>
    <input type="number" name="numero2" step="any" required><br><br>

    <label>Digite o operador da operação:</label>
    <select name="operador" required>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>

    <button type="submit">Calcular</button>
</form>

</body>
</html>