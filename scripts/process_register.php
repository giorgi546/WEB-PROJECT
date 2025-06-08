<?php
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if ($auth->register($_POST['email'], $_POST['password'], $_POST['role'])) {
    header('Location: ../pages/login.php');
} else {
    echo 'Registration failed';
}
