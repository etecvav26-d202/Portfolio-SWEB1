<?php
require_once 'config/conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require 'includes/header.php';
?>

<h2>Lista de Produtos</h2>

<div class="cards-container">
    <?php
    foreach($produtos as $produto){
        ?>
        <div class="card-produto">
            <h3>
            <?php echo $produto['nome']; ?>
        </h3>

        <p>
            <strong>ID:</strong>
            <?php echo $produto['id']; ?>
        </p>

        <p>
            <strong>Fabricante:</strong>
            <?php echo $produto['fabricante']; ?>
        </p>

        <p>
            <strong>Preço:</strong>
            R$ <?php echo $produto['preco']; ?>
        </p>

        <p>
            <strong>Estoque:</strong>
            <?php echo $produto['estoque']; ?>
        </p>

        <div class="acoes">

            <a href="editar.php?id=<?php echo $produto['id']; ?>">
                Editar
            </a>

            <a href="excluir.php?id=<?php echo $produto['id']; ?>"
            onclick="return confirm('Tem certeza que deseja excluir o produto?')">
                Excluir
            </a>

        </div>

    </div>

<?php
}
?>

</div>

<?php
require_once 'includes/footer.php';
?>



