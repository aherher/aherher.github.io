//메인 슬라이드
$('.reviews').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  adaptiveHeight: true, // 높이조절
  dots: false,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 3000,
  speed: 1200,
  arrows: true,
  pauseOnHover: false,
  responsive: [
    {
      breakpoint: 1000,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
    ,
    {
      breakpoint: 650,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
