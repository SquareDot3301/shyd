<?php
session_start();

$slug = $_GET['slug'];
$userId = $_SESSION['user_id'];

if (!$userId) {
    echo "Vous n'êtes pas connectés, vous ne pouvez pas faire ça !";
    exit;
}

include "./config.php";

$sql = "SELECT * FROM posts WHERE slug = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userId !== $article["author"]) {
    echo "Vous n'êtes pas l'auteur de cet article !";
    exit;
}

$sql = "DELETE FROM posts WHERE slug = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug]);
$deletearticle = $stmt->fetch(PDO::FETCH_ASSOC);

header("Location: /blog.php");
?>