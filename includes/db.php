<?php
class Database {
    private $host = 'localhost';
    private $db   = 'shopping';
    private $user = 'root';
    private $pass = '';
    public $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
?>
