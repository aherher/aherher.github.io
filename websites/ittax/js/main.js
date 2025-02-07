//상단 메뉴 스크롤 컬러기능
$(window).scroll(function() {
  var win_h = $(window).scrollTop();
  if (win_h > 150) {
    $(".header_wrap").addClass("head_on");
  } else if (win_h < 150) {
    $(".header_wrap").removeClass("head_on");
  }
});

$('.slide').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  adaptiveHeight: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 2100,
  arrows: false,
  pauseOnHover: false,
});

$('.qaSlide').slick({
  dots: false,
  infinite: true,
  adaptiveHeight: true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1200,
  arrows: false,
  pauseOnHover: false
});

$(".go_home > a").click(function() {
  var home_p = $("#at_home").offset().top - 110;
  $('html, body').animate({
    scrollTop: home_p
  }, 300);
  if ($(".menu_marea").css("display") == "block") {
    $(".menu_marea").animate({
      top: -100 + "%"
    }, function() {
      $(".menu_mwrap").hide();
      $(".sub_menus").hide(0);
      $(".menu_m > li > a").removeClass("opend");
    });
    $(".blck_bg").fadeOut(300);
    $("body, html").css("overflow", "inherit");
    $(".menu_btn").removeClass("close_btn");
  };


  return false;
});
