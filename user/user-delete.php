<?php
session_start();
$userId = $_SESSION['user_id'];
if (!$userId) {
    echo "Vous n'êtes pas connectés !";
}

include "./config.php";

$sql = "DELETE FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$userId]);

if ($stmt->rowCount() > 0) {
    session_destroy();
    header("Location: /");
    exit;
} else {
    echo "Une erreur s'est produite lors de l'effacement de votre compte.";
    echo "<a href='/'>Revenir à l'accueil</a>";
}
?>