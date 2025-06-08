<?php
include '../includes/header.php';
require_once '../includes/db.php';
$db = new Database();
$products = $db->pdo->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Shop</h1>
<div class="flex">
<?php foreach ($products as $p): ?>
  <div class="card">
    <h3><?= htmlspecialchars($p['name']) ?></h3>
    <img src="<?= htmlspecialchars($p['image']) ?>" alt="" style="max-width:100%">
    <p>$<?= $p['price'] ?></p>
    <form method="post" action="cart.php">
      <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
      <button type="submit">Add to Cart</button>
    </form>
  </div>
<?php endforeach; ?>
</div>
<?php include '../includes/footer.php'; ?>
