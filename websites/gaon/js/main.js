//슬라이드에 숫자 넣기.(slick 기능 위에 있어야 함)
var $status = $('.img_nums');
var $slickElement = $('.slide__slider');

$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
  var i = (currentSlide ? currentSlide : 0) + 1;
  $status.text(i + '/' + slick.slideCount);
});


// 메인 슬라이드
$('.slide__slider').slick({
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: true,
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  pauseOnHover: false,
});




//슬라이드에 숫자 넣기.(slick 기능 위에 있어야 함)
var $prem_status = $('.inNums');
var $prem_slickElement = $('.about__imgs');

$prem_slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
  var p = (currentSlide ? currentSlide : 0) + 1;
  $prem_status.text(p + '/' + slick.slideCount);
});

$('.about__imgs').slick({
  dots: false,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: true,
  pauseOnHover: false,
  asNavFor: '.about__texts', // 썸네일 사용시 썸네일의 클래스명을 입력
});


$(".slide__progressive span").addClass("doing");

$(".slide").find(".slick-arrow").click(function () {
  $(".slide__progressive span").removeClass("doing");
  setTimeout(function () {
    $(".slide__progressive span").addClass("doing");
  }, 1000);
});


$('.about__texts').slick({ //하단 썸네일 기능
  asNavFor: '.about__imgs', //메인 슬라이드의 클래스명을입력
  dots: false,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: false,
  focusOnSelect: true,
  pauseOnHover: false,
});

// 플랜 슬라이드
$('.plan__slide').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  dots: false,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: true,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }]
});

$(window).on("load", function () {
  $('.slide__slider').find(".slick-arrow").appendTo(".slide__timebar");
  $('.about__imgs').find(".slick-next").appendTo(".about__control");
  $('.about__imgs').find(".slick-prev").prependTo(".about__control");
});


// 탑버튼
$(".quick__top").click(function () {
  $("body, html").animate({
    scrollTop: 0
  }, 1000);
});