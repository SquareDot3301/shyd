<?php
include "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV["DB_HOST"];
$dbName = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$password = $_ENV["DB_PASSWORD"];

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>