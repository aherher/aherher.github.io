// 현재 완성
$(window).on('load', function () {
  // $(".boxWrap > .main_section").first().addClass("active");
  $(".page1").addClass("active");
  var sec_eqs = $(".boxWrap > .main_section").length - 1;
  // var head_height = $(".header_wrap").height() / 2;
  var s = 1;
  var act = 0;

  // $(".footer_wrap").appendTo(".contents").addClass("main_section");

  $("html,body").stop().animate({
    scrollTop: 0
  }, 1);

  $(".toAnker").click(function () {
    var pageTop = $($(this).attr("href")).offset().top;
    $("body, html").animate({ scrollTop: pageTop + "px" }, 500);
    $(".main_section").removeClass("active");
    $("#page2").addClass("active");
    return false;
  });

  //스크롤 자동이동
  $(".boxWrap > .main_section").each(function () {
    $(this).on("mousewheel DOMMouseScroll", function (e) {
      if (e.originalEvent.wheelDelta >= 0 && $(window).width() > 960) { // 스크롤 업
        if (s == 0) {
          e.preventDefault();
        } else if (s == 1) {
          s = 0;
          $(".active").prev(".main_section").addClass("active");
          $(".active").next(".main_section").removeClass("active");
          var active = $(".boxWrap > .active").offset().top;
          $(".menu_close").hide();
          $(".menu_btn").show();
          $(".menu").slideUp(500);
          $(".black_bg").fadeOut(500);


          if (act <= sec_eqs && act > 0) {
            $(".header").css("top", -93 + "px");
            act -= 1;
            console.log(act);
          } else if (act == 1) {
            act == 0;
          };


          $("html,body").stop().animate({
            scrollTop: active
          }, 500, function () {
            s = 1;
            setTimeout(function () {
              $(".header").css("top", 0 + "px");
            }, 3000);
          });
          e.preventDefault();
        };
      } else if ($(window).width() > 960) { // 스크롤 다운

        if (s == 0) {
          e.preventDefault();
        } else if (s == 1) {
          s = 0;
          $(".active").next(".main_section").addClass("active");
          $(".active").prev(".main_section").removeClass("active");
          var active = $(".boxWrap > .active").offset().top;
          $(".menu_close").hide();
          $(".menu_btn").show();
          $(".menu").slideUp(500);

          $(".black_bg").fadeOut(500);
          // var actEq = $(".boxWrap > .active").inex(".main_section");

          if (act < sec_eqs) {
            $(".header").css("top", -93 + "px");
            act++;
            console.log(act);
          } else if (act >= sec_eqs) {
            act == 4;
          };


          $("html,body").stop().animate({
            scrollTop: active
          }, 500, function () {
            s = 1;
            setTimeout(function () {
              $(".header").css("top", 0 + "px");
            }, 3000);
          });
          e.preventDefault();
        };
      }
    });
  });

});


$(".goBott").click(function () {
  var bottPage = $("#page6").offset().top;
  $("html,body").stop().animate({
    scrollTop: bottPage
  }, 500, function () {
    s = 1;
    $(".main_section").removeClass("active");
    $("#page6").addClass("active");
    setTimeout(function () {
      $(".header").css("top", 0 + "px");
    }, 3000);
  });

  return false;
});