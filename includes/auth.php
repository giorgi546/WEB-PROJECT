<?php
require_once 'db.php';
session_start();

class Auth {
    private $db;
    public function __construct(Database $database) {
        $this->db = $database->pdo;
    }
    public function register($email, $password, $role = 'customer') {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        return $stmt->execute([$email, $hash, $role]);
    }
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
    public function check() {
        return isset($_SESSION['user']);
    }
    public function logout() {
        session_destroy();
    }
    public function user() {
        return $_SESSION['user'] ?? null;
    }
}
?>
