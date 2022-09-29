// 메인 슬라이드
$('.slide').slick({
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  dots: false,
  arrows: true,
  speed: 1000,
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  pauseOnHover: false
});



// 글로벌기업 슬라이드
$('.companyBgs').slick({
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  dots: false,
  arrows: false,
  speed: 1200,
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  pauseOnHover: false
});

