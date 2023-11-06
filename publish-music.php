<?php
session_start();

$userId = $_SESSION['user_id'];

if (!$userId) {
    echo "Vous n'êtes pas connectés, vous ne pouvez pas publier de livres !";
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$author = $userId;
$link = $_POST['link'];

$slug = strtolower(str_replace(' ', '-', $title));

if (strlen($title) > 30) {
    echo "Le titre ne doit pas dépasser 30 caractères.";
    exit;
}

if (strlen($description) > 100) {
    echo "La description ne doit pas dépasser 100 caractères.";
    exit;
}

include "./config.php";

$sql = "INSERT INTO music (slug, title, description, author, link, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug, $title, $description, $author, $link]);

header("Location: /song.php?slug=" . $slug);
exit;
?>