(function ($) {
  "use strict";

  $(".menu-collapse").on("click", function () {
    $(this).toggleClass("active");
    $(this).parent().find(".menu-dropdown").toggleClass("collapsing");
  });

  var url = window.location;

  // Show active menu yang tidak memiliki dropdown
  var navMenu = $("ul.nav-menu a").filter(function () {
    return this.href == url;
  });
  navMenu.siblings().removeClass("active").end().addClass("active");

  // Show active dan dropdown menu yang memiliki dropdown
  var navMenuDropdown = $(".menu-dropdown ul a").filter(function () {
    return this.href == url;
  });
  navMenuDropdown.closest(".menu-dropdown").addClass("collapsing");
  navMenuDropdown
    .closest(".menu-dropdown")
    .parent()
    .find("a.menu-collapse")
    .siblings()
    .removeClass("active")
    .end()
    .addClass("active");
})(jQuery);
