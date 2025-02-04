// 메인 슬라이드
$('.mainVisual__slide').slick({
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  dots: true,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: true,
  pauseOnHover: false,
  // responsive: [{
  //   breakpoint: 960,
  //   settings: {
  //     arrows: false,
  //   }
  // }
  // ]
});


//아티스트 슬라이드
$('.artist__list').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  variableWidth: true,
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: false,
  pauseOnHover: false,
});
