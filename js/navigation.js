const hamburger = document.querySelector(
  ".header-navbar .nav-bar .nav-list .hamburger"
);
const mobile_menu = document.querySelector(
  ".header-navbar .nav-bar .nav-list ul"
);
const menu_item = document.querySelectorAll(
  ".header-navbar .nav-bar .nav-list ul li a"
);
const header = document.querySelector("#header > .header-navbar");

// const logo = document.querySelector(".header-navbar .nav-bar #logo h1");
// const menu = document.querySelectorAll("#header .header .nav-list ul li a");
// const menu = document.querySelector(".item");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  mobile_menu.classList.toggle("active");
});

// document.addEventListener("scroll", () => {
//   var scroll_position = window.scrollY;
//   if (scroll_position > 300) {
//     header.style.backgroundColor = "#fff";
//     // logo.style.color = "#000";
//     header.style.boxShadow = "0px 2px 15px 0px rgba(0, 0, 0, 0.25)";
//   } else {
//     header.style.backgroundColor = "transparent";
//     // logo.style.color = "#fff";
//     header.style.boxShadow = "none";
//   }
// });

menu_item.forEach((item) => {
  item.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    mobile_menu.classList.toggle("active");
  });
});
