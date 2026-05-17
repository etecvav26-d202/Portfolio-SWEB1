<?php
require_once 'config/conexao.php';

$sql = "SELECT * FROM produtos ORDER BY id DESC";

$stmt = $pdo->prepare($sql);



<?php
require 'includes/footer.php';
?>


