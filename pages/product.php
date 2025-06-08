<?php
include '../includes/header.php';
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
$id = $_GET['id'] ?? null;
if (!$id && $auth->check() && $auth->user()['role'] === 'vendor') {
?>
<h1>Upload Product</h1>
<form action="../scripts/upload_product.php" method="post" enctype="multipart/form-data">
  <input type="text" name="name" placeholder="Name" required>
  <textarea name="description" placeholder="Description" required></textarea>
  <input type="number" step="0.01" name="price" placeholder="Price" required>
  <input type="file" name="image" required>
  <button type="submit">Upload</button>
</form>
<?php
} else {
    $stmt = $db->pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product): ?>
        <h1><?= htmlspecialchars($product['name']) ?></h1>
        <img src="<?= htmlspecialchars($product['image']) ?>" alt="" style="max-width:300px">
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p>$<?= $product['price'] ?></p>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; }
include '../includes/footer.php';
?>
