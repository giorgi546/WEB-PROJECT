<?php include '../includes/header.php'; ?>
<h1>Login</h1>
<form action="../scripts/process_login.php" method="post">
  <input type="email" name="email" placeholder="Email" required autocomplete="email">
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit">Login</button>
</form>
<?php include '../includes/footer.php'; ?>
