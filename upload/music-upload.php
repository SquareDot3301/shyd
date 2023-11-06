<?php
session_start();

$userId = $_SESSION['user_id'];

if (!$userId) {
  echo "Vous n'êtes pas connectés, vous ne pouvez pas publier de livres !";
  exit;
}

if (isset($_FILES['mp3File'])) {
  $file = $_FILES['mp3File'];
  $fileName = $file['name'];
  $fileTmpPath = $file['tmp_name'];
  $fileSize = $file['size'];
  $fileError = $file['error'];

  if ($fileError === UPLOAD_ERR_OK) {
    move_uploaded_file($fileTmpPath, '../resources/music/' . $fileName);
    echo 'Le fichier a été téléchargé avec succès !';
    echo 'Voici le lien vers le fichier : https://shyd.xyz/resources/music/' . $fileName . '';
    echo 'Copiez ce lien et mettez-le dans le champ "Lien" du formulaire de partage publique de la musique';
    echo '<a href="../upload.php">Revenir sur la page pour rendre publique mon livre</a>';
    exit;
  } else {
    echo 'Une erreur s\'est produite lors du téléchargement du fichier.';
  }
} else {
  echo '<a class="text-blue-800 underline text-2xl focus:text-red-500" href="/">Retournez au home</a>';
}
?>