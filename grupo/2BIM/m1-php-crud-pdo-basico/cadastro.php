<?php
require_once 'config/conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $fabricante = $_POST['fabricante'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $sql = "INSERT INTO produtos
    (nome, fabricante, preco, estoque)

    VALUES
    (:nome, :fabricante, :preco, :estoque)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':fabricante' => $fabricante,
        ':preco' => $preco,
        ':estoque' => $estoque,
    ]);

    echo "<script>window.location.href='cadastro.php?mensagem-sucesso=1';</script>";
    exit;
}

?>

<?php
require_once 'includes/header.php';
?>

<h2>Cadastrar Produto</h2>

<?php if (isset($_GET['mensagem-sucesso'])): ?>
    <p class="mensagem-sucesso">Produto cadastrado com sucesso!</p>
<?php endif; ?>

<form method="POST">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <br><br>

    <label>Fabricante</label>
    <input type="text" name="fabricante" required>

    <br><br>
    
    <label>Preço</label>
    <input type="number" step="0.01" name="preco" required>

    <br><br>

    <label>Estoque</label>
    <input type="text" name="estoque" required>

    <br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>

<?php
require_once 'includes/footer.php';
?>

