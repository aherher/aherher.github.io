// 현재 완성
$(window).on('load', function () {
  var s = 1;

  //스크롤 자동이동
  $(this).on("mousewheel DOMMouseScroll", function (e) {
    if (e.originalEvent.wheelDelta >= 0) { // 스크롤 업
      var winTop = $(window).scrollTop();
      var mainTop = $("#mainContents").offset().top;

      if (s == 0) {
        e.preventDefault();
      } else if (s == 1) {
        s = 0;

        $("html,body").stop().animate({
          scrollTop: 0
        }, 500, function () {
          s = 1;
        });
        e.preventDefault();
      };


      // if (winTop < mainTop) {
      //   $("body, html").animate({ scrollTop: 0 }, 500);
      // };

    } else { // 스크롤 다운
      var winTop = $(window).scrollTop();
      var headeHeight = $(".header_wrap").height();
      var mainTop = $("#mainContents").offset().top - headeHeight;


      if (s == 0) {
        e.preventDefault();
      } else if (s == 1) {
        s = 0;
        $("html,body").stop().animate({
          scrollTop: mainTop
        }, 500, function () {
          s = 1;
        });
        e.preventDefault();
      };


      // if (winTop < mainTop) {
      //   $("body, html").animate({ scrollTop: mainTop }, 500);
      // };

    }
  });


});

//퀵메뉴 클릭 시
$(".quick_list li a").click(function () {
  var move_col = $($(this).attr("href")).offset().top - head_height;
  $("body, html").animate({
    scrollTop: move_col
  }, 500);
  $(".active").addClass("active");
  $($(this).attr("href")).addClass("active");
  var act_eq = $($(this).attr("href")).index(".service_wrap") - 1;
  $(".quick_list > .on").removeClass("on");
  $(".quick_list > li").eq(act_eq).addClass("on");
  return false;
});