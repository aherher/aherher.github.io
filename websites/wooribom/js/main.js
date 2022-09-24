// 이미지 슬라이드
$('.mainSlide__slide').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  speed: 1000,
  arrows: false,
  fade: true, //페이드
  cssEase: 'linear', //페이드유형
  pauseOnHover: false,
});

// 소식 탭기능
const tabs = document.querySelectorAll(".trueTabs li");
const mainBoards = document.querySelectorAll(".mainNews__boards");

tabs[0].classList.add("on");
mainBoards[0].classList.add("view");

tabs.forEach(arr => {
  arr.addEventListener("click", (event) => {
    let linker = document.querySelector(".trueTabs li a");
    event.preventDefault(linker);
    for (t of tabs) {
      t.classList.remove("on");
    };
    arr.classList.add('on');
    let linkTarget = document.querySelector(event.target.getAttribute("href"));
    for (b of mainBoards) {
      b.classList.remove("view");
    };
    linkTarget.classList.add("view");
  });
});


let winWidth = $(window).width();


// $('.mainCenter__flexWrap').slick({
//   slidesToShow: 5,
//   slidesToScroll: 1,
//   autoplay: false,
//   autoplaySpeed: 2000,
//   responsive: [{
//       breakpoint: 767,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 3,
//         infinite: true,
//         dots: true
//       }
//     },
//     {
//       breakpoint: 9999,
//       settings: "unslick"
//     }
//   ]
// });


$('.mainCenter__flexWrap.mobileContents').slick({
  unslick: false,
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
  speed: 1000,
  // centerMode: true,
  pauseOnHover: false,
});



$(window).resize(function () {
  let winWidth = $(window).width();

  if (winWidth <= 768) {
    // location.reload();
  }
  // $('.mainCenter__flexWrap').slick({
  //   responsive: [{
  //       breakpoint: 1920,
  //       settings: "unslick"
  //     },
  //     {
  //       breakpoint: 768,
  //       settings: {
  //         unslick: false,
  //         dots: false,
  //         infinite: true,
  //         autoplay: false,
  //         autoplaySpeed: 4000,
  //         arrows: false,
  //         speed: 1200,
  //         centerMode: true,
  //         pauseOnHover: false,
  //       }
  //     }
  //   ]
  // });
});


// 애니메이션 효과
function doAnimation() {
  var windowScroll = $(window).scrollTop();

  $(".unMove").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 2;
    var scolling = windowScroll + window_height + 100;
    console.log(window_height);

    if (unMove_top <= scolling) {
      $(this).addClass("moveOn");
    };
  });
};

function doAnimation2() {
  var windowScroll = $(window).scrollTop();

  $(".moverWrap").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 2;
    var scolling = windowScroll + window_height;

    if (unMove_top <= scolling) {
      $(this).addClass("moverOn_Wrap");
    };
  });
};


doAnimation();
doAnimation2();



$(window).scroll(function () {
  doAnimation();
  doAnimation2();
});