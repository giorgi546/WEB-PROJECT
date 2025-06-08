<?php include '../includes/header.php'; ?>
<h1>Register</h1>
<form action="../scripts/process_register.php" method="post">
  <input type="email" name="email" placeholder="Email" required autocomplete="email">
  <input type="password" name="password" placeholder="Password" required>
  <select name="role">
    <option value="customer">Customer</option>
    <option value="vendor">Vendor</option>
  </select>
  <button type="submit">Register</button>
</form>
<?php include '../includes/footer.php'; ?>
