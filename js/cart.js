// ///////////////////////////////////////////
// FOR THE NAV BUTTON
let btnNavEL = document.querySelector(".btn-mobile-nav");
let headerEL = document.querySelector(".header");

btnNavEL.addEventListener("click", function () {
  headerEL.classList.toggle("nav-open");
});
