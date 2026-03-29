<!--
Data: 30/03/2026
Autor: Amanda Neves Oliveira e Ana Lívia Takeyama Romanato - 2°D
Objetivo: Aplicar regras lógicas e operadores matemáticos para verificar condições específicas em um valor.

Exercício 10 - Ano Bissexto
Leia um ano e informe se ele é bissexto.
Um ano é bissexto se:
- É múltiplo de 400
ou
- É múltiplo de 4 e não é múltiplo de 100
--> 
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Exercício 10 - Ano Bissexto</title>
</head>
<body>
    <h1> Ano Bissexto <h1>
        <form action="calcula.php" method="POST">
            <label> Informe um ano:</label>
            <input type="number" name="ano" required>

            <button type="submit"> Ver se é bissexto </button>

</form>
</body>
</html>