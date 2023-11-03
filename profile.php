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
  <title>Shyd | Mon profile</title>
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
          <a href="#" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/book.png" class="px-3"
              alt="Book" />Livres</a>
          <a href="#" class="px-4 py-2 text-sm flex items-center"><img src="./assets/img/music.png" class="px-3"
              alt="Music" />Musique</a>
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
            class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-primary"
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
            href="./login.html"
            >Connexion</a
            >';
        echo '<a
            class="text-lg md:text-3xl mx-2 sm:mx-4 duration-150 border-b-2 border-black text-second hover:text-primary hover:border-primary"
            href="./register.html"
            >Inscription</a
            >';
      }
      ?>
    </div>
  </nav>
  <header class="h-full">
    <section class="my-5">
      <h1 class="text-center text-4xl underline">Mon profile :</h1>
      <div class="flex justify-center my-10">
        <form class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-6" action="./user-update.php" method="post"
          enctype="multipart/form-data">
          <?php
          $sql = "SELECT username, email, password FROM users WHERE id = ?";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([$userId]);
          $user = $stmt->fetch();
          echo '<div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="username"
          >Pseudo :</label
        >
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text"
          id="username"
          name="username"
          value="' . $user["username"] . '"
          required
        />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="email"
          >Email :</label
        >
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="email"
          id="email"
          name="email"
          value="' . $user["email"] . '"
          required
        />
      </div>

      <div class="mb-4">
        <label class="block text-text text-xl font-bold mb-2" for="password"
          >Mot de passe :</label
        >
        <input
          class="w-full md:w-5/6 xl:w-4/6 px-3 py-2 border-4 border-second rounded-md focus:outline-none focus:border-primary text-bg"
          type="text"
          id="password"
          name="password"
          placeholder="Rentrez votre mot de passe pour confirmer ou modifiez-le"
          value=""
          required
        />
      </div>

      <div class="flex justify-start">
        <input
          class="border-2 border-black p-2 rounded-xl hover:cursor-pointer"
          type="submit"
          value="Post"
        />
      </div>';
          ?>
        </form>
        <a class="text-second underline focus:text-primary" href="./user-delete.php">Supprimer mon compte</a>
      </div>
    </section>
  </header>
  <footer class="h-36 bg-slate-400 fleex justify-center items-center w-full">
    <div class="flex justify-center items-center h-full">
      <h3>CopyLeft | Shyd by ShadowMonsterMan</h3>
    </div>
  </footer>
  <script src="./assets/js/main.js"></script>
</body>

</html>