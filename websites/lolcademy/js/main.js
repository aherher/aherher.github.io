$(window).scroll(function () {
  var winTop = $(window).scrollTop();
  var mC_top = $("#mainContents").offset().top;
  if (winTop > 50) {
    $(".header_wrap").addClass("on_head");
  } else {
    $(".header_wrap").removeClass("on_head");
  };
});


$('.main_slide').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: false,
  fade: true,
  pauseOnHover: false,
});



$('.qin_slide').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1200,
  adaptiveHeight: true,
  arrows: false,
  pauseOnHover: false,
});



function main_quick() {
  var win_scr = $(window).scrollTop();
  var win_width = $(window).width();
  var win_height = $(window).height();
  if (win_scr > 30 || win_width < 1140 || win_height < 820) {
    $(".main_quik").addClass("main_quik_on");
    $(".right_quick").addClass("right_quick_on");
  } else {
    $(".main_quik").removeClass("main_quik_on");
    $(".right_quick").removeClass("right_quick_on");
  };
};

main_quick();

$(window).scroll(function () {
  main_quick();
});

$(window).resize(function () {
  main_quick();
});
