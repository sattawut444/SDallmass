"use strict";

$(window).load(function () {
  var menuMobilesShow = $(window).width() <= 812;
  var headerSelector = menuMobilesShow ? ".web-nav-mobi" : ".bg-menu";
  var timelineWrapSelector = ".horizontalTimelineWrap";
  var headerHeight = $(headerSelector).outerHeight();
  var timelineWrapHeight = $(timelineWrapSelector).outerHeight();
  var opts = {
    sectionSelector: ".fullpageSection",
    verticalCentered: false,
    paddingTop: headerHeight,
    paddingBottom: timelineWrapHeight,
    navigation: $(".fullpageSection").length > 1,
    navigationPosition: "right",
    scrollOverflow: true,
    scrollOverflowOptions: {
      scrollbars: "custom",
      preventDefault: false
    },
    controlArrows: false,
    afterLoad: function afterLoad(anchorLink, index) {
      var _scrollWrapper = $(this).find(".fp-scrollable");

      $.fn.fp_scrolloverflow.iscrollHandler.update($(this), _scrollWrapper.outerHeight());
      $(this).find("img").load(function () {
        $.fn.fp_scrolloverflow.iscrollHandler.update($(this), _scrollWrapper.outerHeight());
      });
    },
    afterRender: function afterRender() {
      var _this = this;

      var moreThan3Items = $(".horizontalTimelineItem").length > 3;
      $(".horizontalTimeline").addClass(moreThan3Items ? "moreThan3Items" : "");
      setTimeout(function () {
        $(_this).parents(".fullpageContainer").addClass("initialed");
        $("#fp-nav").css({
          transform: "translateY(-50%)",
          marginTop: headerHeight * 0.5 + "px"
        });
        setTimeout(function () {
          $(".horizontalTimeline").addClass("initialed");
        }, 400);
      }, 700);
    },
    onSlideLeave: function onSlideLeave(anchorLink, index, slideIndex, direction, nextSlideIndex) {
      $(".fullpageSlideNavItem.active").removeClass("active");
      $(".fullpageSlideNavItem").eq(nextSlideIndex).addClass("active");
    }
  };
  $("#fullpage").fullpage(opts);
  $(".fullpageSlideNavItem").click(function () {
    var index = $(this).index();
    var parentIndex = $(this).parents(".fullpageSection").index();
    $.fn.fullpage.moveTo(parentIndex + 1, index);
  });
  $(".fullpageSection").each(function () {
    var $images = $(this).find(".sectionImage");

    if ($images.length > 0) {
      $images.each(function (anImageIndex, anImage) {
        $(anImage).addClass("isIndex" + anImageIndex);
      });
    }
  });
});