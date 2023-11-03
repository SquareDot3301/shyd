const userButton = document.getElementById("userButton");

const userMenu = document.getElementById("userMenu");

userButton.addEventListener("click", () => {
  userMenu.classList.toggle("hidden");
});

const userButton2 = document.getElementById("userButton2");

const userMenu2 = document.getElementById("userMenu2");

userButton2.addEventListener("click", () => {
  userMenu2.classList.toggle("hidden");
});
