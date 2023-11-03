<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/output.css">
  <link rel="me" href="https://piaille.fr/@squaredot" />
  <meta name="description" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon" />
  <meta name="keywords" content="livre, epub, gratuit, ebooks, ebook, quetzal, data, twitter, mastodon, matrix" />
  <meta property="og:title" content="MaelDev.fr" />
  <meta property="og:description" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <meta property="og:image" content="./assets/img/banner.png" />
  <meta property="og:image:alt" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="600" />
  <meta property="og:site_name" content="Shyd" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:image:src" content="./assets/img/banner.png" />
  <meta name="twitter:image:alt" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <meta name="twitter:title" content="shyd.xyz" />
  <meta name="twitter:site" content="@squaredotcb" />
  <meta name="twitter:description" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <title>Shyd | Upload</title>
</head>

<body class="bg-bg text-text">
  <nav class="flex justify-between items-center w-full h-40 bg-slate-400">
    <div class="mx-5 sm:mx-10">
      <a class="text-2xl md:text-4xl duration-150 border-b-2 border-gray-600 text-gray-600" href="/"><img
          src="./assets/img/logo.png" class="h-24" alt="" /></a>
    </div>
    <div class="flex items-center mx-5 sm:hidden">
      <div class="relative">
        <button id="userButton" class="text-lg md:text-3xl mx-2 sm:mx-4">
          <img src="./assets/img/menu.png" class="h-10" alt="" />
        </button>
        <div id="userMenu" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg hidden">
          <a href="/books.php" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/book.png" class="px-3"
              alt="Book" />Livres</a>
          <a href="/music.php" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/music.png"
              class="px-3" alt="Music" />Musique</a>
          <a href="./blog.php" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/blog.png" class="px-3"
              alt="Blog" />Blog</a>
          <hr />
          <?php
          session_start();

          if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            include './config.php';

            $sql = "SELECT username FROM users WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$userId]);
            $user = $stmt->fetch();

            echo '<a
            href="./profile.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
              src="./assets/img/user.png"
              class="px-3"
              alt="User"
            />Profile</a
            >';
            echo '<a
            href="./upload.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
              src="./assets/img/plus.png"
              class="px-3"
              alt="Post"
            />Publier</a
            >';
            echo '<a
            href="/auth-logout.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
            src="./assets/img/logout.png"
            class="px-3"
            alt="Logout"
            />Déconnexion</a
            >';
          } else {
            echo '<a
            href="/login.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
              src="./assets/img/login.png"
              class="px-3"
              alt="Login"
            />Connexion</a
            >';
            echo '<a
            href="/register.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
              src="./assets/img/register.png"
              class="px-3"
              alt="Register"
            />Inscription</a
            >';
          }
          ?>
        </div>
      </div>
    </div>
    <div class="hidden sm:flex sm:items-center mx-5 sm:mx-10">
      <a class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
        href="./books.php">Livres</a>
      <a class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
        href="./music.php">Musique</a>
      <a class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
        href="./blog.php">Blog</a>
      <?php
      session_start();

      if (isset($_SESSION['user_id'])) {
        echo '<div class="relative">';
        echo '<button
            id="userButton2"
            class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
            >
            ' . $user['username'] . '
            </button>';
        echo '<div
            id="userMenu2"
            class="absolute right-0 mt-2 py-2 w-44 bg-white rounded-md shadow-lg hidden"
            >';
        echo '<a
            href="./profile.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
            src="./assets/img/user.png"
            class="px-3"
            alt="User"
            />Profile</a
            >';
        echo '<a
            href="./upload.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
            src="./assets/img/plus.png"
            class="px-3"
            alt="Post"
            />Publier</a
            >';
        echo '<a
            href="/auth-logout.php"
            class="px-4 py-2 text-sm flex items-center"
            ><img
            src="./assets/img/logout.png"
            class="px-3"
            alt="Logout"
            />Déconnexion</a
            >';
        echo '</div>';
        echo '</div>';
      } else {
        echo '<a
            class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
            href="/login.php"
            >Connexion</a
            >';
        echo '<a
            class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
            href="/register.php"
            >Inscription</a
            >';
      }
      ?>
    </div>
  </nav>
  <h1 class="text-center my-10 text-3xl">Upload de livres</h1>
  <div class="flex justify-center my-10">
    <form action="./upload/music-upload.php" method="post" enctype="multipart/form-data">
      <input type="file" accept=".mp3" name="mp3File" />
      <input class="border-2 border-black p-2 rounded-xl" type="submit" value="Upload" />
    </form>
  </div>
  <h1 class="text-center my-10 text-3xl">Rendre publique un livre uploadé</h1>
  <div class="flex justify-center my-10">
    <form class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6" action="./publish-book.php" method="post"
      enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="title">Titre :</label>
        <input
          class="w-full md:w-4/6 xl:w-2/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="title" name="title" required maxlength="30" />
      </div>
      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="description">Description :</label>
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="description" name="description" required maxlength="100" />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="link">Lien
          (https://shyd.xyz/resources/books/le-nom-de-votre-fichier-epub.epub) :</label>
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="link" name="link" required />
      </div>
      <div class="flex justify-end">
        <input class="border-2 border-black p-2 rounded-xl hover:cursor-pointer" type="submit" value="Post" />
      </div>
    </form>
  </div>
  <h1 class="text-center my-10 text-3xl">Upload de musique</h1>
  <div class="flex justify-center my-10">
    <form action="./upload/book-upload.php" method="post" enctype="multipart/form-data">
      <input type="file" accept=".mp3" name="mp3File" />
      <input class="border-2 border-black p-2 rounded-xl" type="submit" value="Upload" />
    </form>
  </div>
  <h1 class="text-center my-10 text-3xl">Rendre publique une musique uploadée</h1>
  <div class="flex justify-center my-10">
    <form class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6" action="./publish-music.php" method="post"
      enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="title">Titre :</label>
        <input
          class="w-full md:w-4/6 xl:w-2/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="title" name="title" required maxlength="30" />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="description">Description :</label>
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="description" name="description" required maxlength="100" />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="link">Lien
          (https://shyd.xyz/resources/books/le-nom-de-votre-fichier-mp3.mp3) :</label>
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="link" name="link" required />
      </div>
      <div class="flex justify-end">
        <input class="border-2 border-black p-2 rounded-xl hover:cursor-pointer" type="submit" value="Post" />
      </div>
    </form>
  </div>
  <h1 class="text-center my-10 text-3xl">Upload d'articles</h1>
  <div class="flex justify-center my-10">
    <form class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6" action="./posts/article-upload.php" method="post"
      enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="title">Titre :</label>
        <input
          class="w-full md:w-4/6 xl:w-2/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="title" name="title" required maxlength="30" />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="description">Description :</label>
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text" id="description" name="description" required maxlength="100" />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="content">Contenu :</label>
        <textarea
          class="w-full h-96 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          id="content" name="content" required></textarea>
      </div>

      <div class="flex justify-end">
        <input class="border-2 border-black p-2 rounded-xl hover:cursor-pointer" type="submit" value="Post" />
      </div>
    </form>
  </div>
  <footer class="h-36 bg-slate-400 fleex justify-center items-center w-full">
    <div class="flex justify-center items-center h-full">
      <h3>CopyLeft | Shyd by ShadowMonsterMan</h3>
    </div>
  </footer>
  <script src="./assets/js/main.js"></script>
</body>

</html>