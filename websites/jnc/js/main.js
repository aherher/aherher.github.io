var win_width = $(window).width();
var win_height = $(window).height();

function auto_height() {
  $(".main_bg").css("height", $(window).height());
  $(".bgs_wrap").css("height", $(window).height());
};
auto_height();

//$(".bgs_wrap .main_bg").hide();
//$(".bgs_wrap .main_bg").eq(0).show();
/*if ($(window).width() < 421) {
  $(".footer_wrap").css("top", $(window).height());
};*/


$(window).resize(function() {
  auto_height();
});

var main_btn = '<p class="main_btn"><a href="images/JNC_brochure.pdf" target="_blank">Brochure Download</a></p>';
$(main_btn).appendTo(".main_cops");


//main
$('.bgs_wrap').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 5000,
  speed: 2000,
  arrows: false,
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  pauseOnHover: false,

});
/*$(function() {
  $('.bgs_wrap').bxSlider({
    mode: 'fade',
    speed: 1500,
    pause: 6000,
    auto: true
  });
});*/
