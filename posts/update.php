<?php
session_start();

$slug = $_GET['slug'];

include "./config.php";

$userId = $_SESSION['user_id'];

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

echo "<form action='article-update.php?slug=" . $article['slug'] . "' method='POST'>";
echo "<input type='hidden' name='slug' value='" . $article['slug'] . "'>";
echo "<label for='title'>Titre :</label>";
echo "<input type='text' id='title' name='title' value='" . $article['title'] . "' required maxlength='30' />";
echo "<label for='description'>Description :</label>";
echo "<input type='text' id='description' name='description' value='" . $article['description'] . "' required maxlength='100' />";
echo "<label for='content'>Contenu :</label>";
echo "<textarea id='content' name='content' required maxlength='10000'>" . $article['content'] . "</textarea>";
echo "<input type='submit' value='Modifier'>";
echo "</form>";
?>