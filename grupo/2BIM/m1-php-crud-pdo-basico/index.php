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
require_once 'includes/footer.php';
?>



