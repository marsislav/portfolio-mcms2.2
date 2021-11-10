jQuery(function ($) {
  /* Mobile menu */
  $(".mobile-menu-icon").click(function () {
    $(".mobile-menu-icon").toggleClass("mobile-menu-icon-close");
    $("header .menuDots ul li").fadeToggle(200, "linear");
    $("header .menuDots ul li").css("display", "block");
  });
  /*Mobile menu - end */
  /*Contact  form validation */
  document.querySelector(".send").addEventListener("click", function () {});
  /*Contact  form validation - end*/
});
function menuOnClick() {
  document.getElementById("menu-bar").classList.toggle("change");
  document.getElementById("nav").classList.toggle("change");
  document.getElementById("menu-bg").classList.toggle("change-bg");
}

/**/
