<?php
require_once 'config/conexao.php'

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "INSERT INTO produtos
    (nome, fabricante, preco, estoque)

    VAlUES
    (: nome, :fabricante, :preco, :estoque)";

    $stmt = $pdo->prepare($sql);

    &stmt->execute([
        ':nome' => $nome;
        ':fabricante' => $fabricante;
        ':preco' => $preco;
        ':estoque' => $estoque
    ]);

    echo "Produto cadastro com sucesso.";
}

?>

<?php
require_once 'includes/header.php';
?>
