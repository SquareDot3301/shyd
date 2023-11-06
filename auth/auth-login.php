<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

include './config.php';

$sql = "SELECT id, username, password FROM users WHERE username = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header('Location: /');
    echo "Connexion réussie !";
    echo "<a href='/'>Home</a>";
} else {
    echo "Identifiants invalides. Veuillez réessayer.";
}
?>