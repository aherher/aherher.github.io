// 현재 완성
$(window).on('load', function () {
  $("#mainPage > section").first().addClass("active");
  var sec_eqs = $("#mainPage > section").length;
  var s = 1;

  // $(".footer_wrap").appendTo(".contents").addClass("main_section");

  $("html,body").stop().animate({
    scrollTop: 0
  }, 1);

  //스크롤 자동이동
  $("#mainPage > section").each(function () {
    $(this).on("mousewheel DOMMouseScroll", function (e) {
      if (e.originalEvent.wheelDelta >= 0 && $(window).width() > 1200) { // 스크롤 업
        if (s == 0) {
          e.preventDefault();
        } else if (s == 1) {
          s = 0;
          $(".active").prev("section").addClass("active");
          $(".active").next("section").removeClass("active");
          var act_eq = $("#mainPage > .active").index() - 1;
          var active = $("#mainPage > .active").offset().top;
          $("html,body").stop().animate({
            scrollTop: active
          }, 500, function () {
            s = 1;

          });
          e.preventDefault();
        };
      } else if ($(window).width() > 1200) { // 스크롤 다운

        if (s == 0) {
          e.preventDefault();
        } else if (s == 1) {
          s = 0;
          $(".active").next("section").addClass("active");
          $(".active").prev("section").removeClass("active");


          var active = $("#mainPage > .active").offset().top;
          $("html,body").stop().animate({
            scrollTop: active
          }, 500, function () {
            s = 1;

          });
          e.preventDefault();
        };
      }
    });
  });

});