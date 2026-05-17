<?php
require_once 'config/conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "UPDATE produtos
    
    SET 
    nome = :nome,
    fabricante = :fabricante,
    preco = :preco,
    estoque = :estoque
    
    WHERE id = :id;"

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":nome" => $nome,
        ":fabricante" => $fabricante,
        ":preco" => $preco,
        ":estoque" => $estoque,
        ":id" => $id
    ]);

    header("Location: index.php");
}

?>

<?php
require_once 'includes/header.php';
?>

<h2>Editar Produtos</h2>

<form method="POST">
    <label>Nome</label>
    <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

    <br><br>

    <label>Fabricante</label>
    <input type="text" name="fabricante" value="<?php echo $produto['fabricante']; ?>" required>

    <br><br>

    <label>Preço</label>
    <input type="text" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>

    <br><br>

    





    
