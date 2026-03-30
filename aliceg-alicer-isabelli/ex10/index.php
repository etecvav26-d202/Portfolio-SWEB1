<!--
Data: 30/03/2026
Autor: Alice Rasmussen Rezende Alves, Alice Gimenez Siqueira e Isabelli Dias da Silva 2°D
Objetivo:

Ano Bissexto
Leia um ano e informe se ele é bissexto.

Um ano é bissexto se:

Éca de 400
ou
É múltiplo de 4 e não é múltiplo de 100
--> 

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Exercício 10 </title>
</head>
<body>
    <h1> Ano Bissexto <h1>
        <form action="exercicio10/calcula.php" method="POST">
            <label> Informe um ano: >
            <input type="number" name="ano" required>

            <button type="submit"> Ver se é bissexto </button>

</form>
</body>
</html>