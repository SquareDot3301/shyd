module.exports = {
  content: [
    "./index.php",
    "./test.html",
    "./upload.php",
    "./books.php",
    "./login.html",
    "./register.html",
    "./upload.html",
    "./book.php",
    "./blog.php",
    "./article.php",
  ],
  theme: {
    colors: {
      bg: "#030111",
      text: "#f6f7f7",
      primary: "#4e0c45",
      second: "#7ea9b1",
    },
    extend: {
      fontFamily: {
        coolvetica: ["Coolvetica"],
      },
    },
  },
  plugins: [require("@tailwindcss/typography", "@tailwindcss/forms")],
};
