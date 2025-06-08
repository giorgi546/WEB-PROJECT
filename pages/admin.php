<?php
include '../includes/header.php';
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if (!$auth->check() || $auth->user()['role'] !== 'admin') { header('Location: login.php'); exit; }
$users = $db->pdo->query("SELECT id, email, role FROM users")->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Admin Panel</h1>
<a href="../scripts/export_users.php">Export Users</a>
<table>
  <tr><th>ID</th><th>Email</th><th>Role</th></tr>
  <?php foreach ($users as $u): ?>
  <tr><td><?= $u['id'] ?></td><td><?= htmlspecialchars($u['email']) ?></td><td><?= $u['role'] ?></td></tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>
