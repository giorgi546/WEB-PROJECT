<?php
require_once '../includes/auth.php';
$auth = new Auth(new Database());
$auth->logout();
header('Location: ../pages/login.php');
