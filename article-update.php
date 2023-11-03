<?php
$slug = $_POST['slug'];
$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];

include "./config.php";

$sql = "UPDATE posts SET title = ? WHERE slug = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $slug]);

if ($stmt->rowCount() > 0) {
    echo "L'article a été modifié avec succès.";
    header("Location: /article.php?slug=" . $slug);
} else {
    echo "Une erreur s'est produite lors de la modification de l'article.";
    echo "<a href='/'>Revenir à l'accueil</a>";
}
?>