<?php
session_start();
$userId = $_SESSION['user_id'];
if (!$userId) {
    echo "Vous n'êtes pas connectés !";
}
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

include "./config.php";

$sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $email, $hashedPassword, $userId]);

if ($stmt->rowCount() > 0) {
    header("Location: /profile.php");
    exit;
} else {
    echo "Une erreur s'est produite lors de la modification de l'article.";
    echo "<a href='/'>Revenir à l'accueil</a>";
}
?>