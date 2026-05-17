<?php
require_once 'config/conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
require 'includes/footer.php';
?>

<h2>Lista de Produtos</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Fabricante</th>
        <th>Preço</th>
        <th>Estoque</th>
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

            

    }

