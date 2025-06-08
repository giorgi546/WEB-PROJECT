<?php
require_once '../includes/auth.php';
$db = new Database();
$auth = new Auth($db);
if (!$auth->check() || $auth->user()['role'] !== 'admin') { die('Unauthorized'); }
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=users.csv');
$out = fopen('php://output', 'w');
$rows = $db->pdo->query("SELECT id, email, role FROM users");
fputcsv($out, ['id','email','role']);
foreach ($rows as $row) { fputcsv($out, $row); }
fclose($out);
