<?php
$host = 'localhost';
$db   = 'health_system';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
