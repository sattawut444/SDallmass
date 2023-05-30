"use strict";

$(document).ready(function () {
  var isMobile = $(window).width() <= 812;
  $(".columnExpandItem").on("mouseenter click", function () {
    var _prevActive = $(this).siblings(".active");

    if (isMobile) {
      _prevActive.find(".descWrap").css("height", 0);

      var height = $(this).find(".desc").outerHeight();
      $(this).find(".descWrap").css("height", height);
    }

    _prevActive.removeClass("active");

    $(this).addClass("active");
  });
});