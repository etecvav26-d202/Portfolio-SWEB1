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

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Ações</th>
    </tr>

    <?php
    foreach($produtos as $produto){
        ?>

        <tr>
            <td>
                <?php 
                echo $produto['id'];
                ?>
            </td>

            <td>
                <?php
                echo $produto['nome'];
                ?>
            </td>

            <td>
                <?php
                echo $produto['fabricante'];
                ?>
            </td>

            <td>
                R$ <?php
                echo $produto['preco'];
                ?>
            </td>

            <td>
                <?php
                echo $produto['estoque'];
                ?>
            </td>

            <td>
                <a href="editar.php?id=<?php echo $produto['id']; ?>">
                Editar
                </a>

                <a href="excluir.php?id=<?php
                echo $produto['id'];
                ?>">
                Excluir
                </a>
            </td>


        </tr>

        <?php }
        ?>
</table>

<?php
require_once 'includes/footer.php';
?>



