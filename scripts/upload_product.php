<?php
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if (!$auth->check() || $auth->user()['role'] !== 'vendor') { die('Unauthorized'); }
$target = '../uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $target);
$stmt = $db->pdo->prepare("INSERT INTO products (name, description, price, image, user_id) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([
    $_POST['name'],
    $_POST['description'],
    $_POST['price'],
    $target,
    $auth->user()['id']
]);
header('Location: ../pages/shop.php');
