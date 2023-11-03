<?php
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

include './config.php';

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $hashedPassword]);
    $userId = $pdo->lastInsertId();

    $_SESSION['user_id'] = $userId;

    header('Location: /');
    exit;
} catch (PDOException $e) {
    echo "Erreur lors de l'inscription : " . $e->getMessage();
}
?>