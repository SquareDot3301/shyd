<?php
session_start();

$userId = $_SESSION['user_id'];

if (!$userId) {
    echo "Vous n'êtes pas connectés, vous ne pouvez pas poster d'articles !";
    exit;
}

include './config.php';

$title = $_POST['title'];
$description = $_POST['description'];
$author = $userId;
$content = $_POST['content'];

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

$sql = "INSERT INTO posts (slug, title, description, author, content, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug, $title, $description, $author, $content]);

header("Location: /article.php?slug=" . $slug);
exit;
?>