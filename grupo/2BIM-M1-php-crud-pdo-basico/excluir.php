<?php
require_once 'config/conexao.php';

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id = :id";

$stmt = $pdo->prepare($sql);

