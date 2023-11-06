<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/output.css">
  <link rel="me" href="https://piaille.fr/@squaredot" />
  <meta name="description" content="Shyd - Anonymous collective fighting for rights on the Internet" />
  <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon" />
  <meta name="keywords" content="livre, epub, gratuit, ebooks, ebook, quetzal, data, twitter, mastodon, matrix" />
  <meta property="og:title" content="Shyd.xyz" />
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
  <title>Shyd | Blog</title>
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
          <a href="./books.php" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/book.png"
              class="px-3" alt="Book" />Livres</a>
          <a href="./music.php" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/music.png"
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
            href="./auth/auth-logout.php"
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
      <a class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-primary"
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
            href="./auth/auth-logout.php"
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
  <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 place-items-center">
    <?php
    include "./config.php";

    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($articles as $article) {
      echo '<div
      class="border-2 my-5 border-text p-4 w-4/5 break-words rounded-es-3xl rounded-tr-3xl duration-200 hover:rounded-es-none hover:rounded-tr-none hover:rounded-ss-3xl hover:rounded-br-3xl"
      >';
      echo "<a class='block' href='article.php?slug=" . $article['slug'] . "'>";
      echo "<h1 class='text-3xl text-center text-second'>" . $article['title'] . "</h1>";
      echo "<p class='text-md my-5 text-center italic'>" . $article['description'] . "</p>";
      echo '</a>';
      echo '</div>';
    }
    ?>
  </div>
  <footer class="h-36 bg-slate-400 fleex justify-center items-center w-full">
    <div class="flex justify-center items-center h-full">
      <h3>CopyLeft | Shyd by ShadowMonsterMan</h3>
    </div>
  </footer>
  <script src="./assets/js/main.js"></script>
</body>

</html>