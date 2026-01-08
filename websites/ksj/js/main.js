$('.visual__slide').slick({
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



$('.story__slide').slick({
  dots: false,
  infinite: true,
  autoplay: false,
  speed: 1200,
  arrows: false,
  pauseOnHover: false,
  adaptiveHeight: true,
  asNavFor: '.story__thum',

});

$('.story__thum').slick({ //하단 썸네일 기능
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.story__slide', //메인 슬라이드의 클래스명을입력
  dots: false,
  focusOnSelect: true,
  speed: 1200,
  vertical: true, //세로모드
  responsive: [{
    breakpoint: 1200,
    settings: {
      vertical: false, //세로모드
    }
  }
  ]
});
