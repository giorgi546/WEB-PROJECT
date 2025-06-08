<?php
include '../includes/header.php';
session_start();
$cart = $_SESSION['cart'] ?? [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart[] = $_POST['product_id'];
    $_SESSION['cart'] = $cart;
}
?>
<h1>Your Cart</h1>
<div id="cart">
<ul>
<?php foreach ($cart as $id): ?>
  <li>Product ID: <?= $id ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php include '../includes/footer.php'; ?>
