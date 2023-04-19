$(document).ready(function () {
  function toggleNavbar() {
    let navbar = document.querySelector(".navbar");
    let button = document.querySelector(".navbar-toggler");

    if (window.innerWidth >= 768) {
      navbar.classList.add("navbar-expand-md");
      button.classList.add("d-none");
    } else {
      navbar.classList.remove("navbar-expand-md");
      button.classList.remove("d-none");
    }
  }

  // Exécute la fonction lorsque la page se charge ou lorsque la fenêtre est redimensionnée
  window.addEventListener("resize", toggleNavbar);
  window.addEventListener("load", toggleNavbar);
});
