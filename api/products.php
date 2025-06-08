<?php
require_once '../includes/db.php';
$db = new Database();
$products = $db->pdo->query("SELECT id,name,price,image FROM products")->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($products);
