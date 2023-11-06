<?php
session_start();

include "./config.php";

$userId = $_SESSION['user_id'];

$slug = $_GET['slug'];

$sql = "SELECT * FROM posts WHERE slug = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$slug]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    echo "L'article demandé n'existe pas.";
    exit;
}

if ($article["author"] !== $userId) {
    echo "Vous n'êtes pas l'auteur de cet article !";
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];

$slug_update = strtolower(str_replace(' ', '-', $title));


$sql = "UPDATE posts SET title = ?, description = ?, content = ? WHERE slug = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $description, $content, $slug_update]);

if ($stmt->rowCount() > 0) {
    echo "L'article a été modifié avec succès.";
    header("Location: /article.php?slug=" . $slug_update);
} else {
    echo "Une erreur s'est produite lors de la modification de l'article.";
    echo "<a href='/'>Revenir à l'accueil</a>";
}
?>