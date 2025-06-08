<?php
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if ($auth->login($_POST['email'], $_POST['password'])) {
    header('Location: ../pages/dashboard.php');
} else {
    echo 'Login failed';
}
