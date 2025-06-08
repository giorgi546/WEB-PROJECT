<?php
include '../includes/header.php';
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if (!$auth->check()) { header('Location: login.php'); exit; }
$user = $auth->user();
?>
<h1>Dashboard</h1>
<p>Welcome, <?= htmlspecialchars($user['email']) ?> (<?= $user['role'] ?>)</p>
<?php if ($user['role'] === 'vendor'): ?>
  <p><a href="../pages/product.php">Upload Product</a></p>
<?php endif; ?>
<?php if ($user['role'] === 'admin'): ?>
  <p><a href="admin.php">Admin Panel</a></p>
<?php endif; ?>
<p><a href="../scripts/logout.php">Logout</a></p>
<?php include '../includes/footer.php'; ?>
