

//   //메인 이미지 롤링
//   $(".slide li").first().show();
//   var i = 0;
//   var ims = $(".slide li").length - 1; // 총 갯수
//   var total = $(".slide li").length;
//   var count = i + 1;
//   $(".img_nums .current").text("0" + count);
//   $(".img_nums .alls").text("0" + total);
//   var onplay = true;

//   //기본 롤링 기능
//   function rolling() {
//     $(".slide li").fadeOut(1000);
//     $(".slide li").eq(i).fadeIn(1000);
//     var count = i + 1;
//     $(".img_nums .current").text("0" + count);
//   };

//   //이미지 총 갯수 별 도트. 순서.
//   function fade() {
//     if (onplay == true) {
//       if (i < ims) { i++; }
//       else if (i >= ims) { i = 0; };
//       rolling();
//     } else if (onplay == false) {
//       return false;
//     };
//   };

//   //우클릭
//   function click_right() {
//     if (i < ims) {
//       i++;
//       rolling();
//     } else if (i >= ims) {
//       i = 0;
//       rolling();
//     };
//   };
//   $(".next").on("click", function () {
//     click_right();
//   });

//   //좌클릭
//   function click_left() {
//     if (i == 0) {
//       i = ims;
//       rolling();
//     } else if (i <= ims) {
//       i -= 1;
//       rolling();
//     };
//   };
//   $(".prev").on("click", function () {
//     click_left();
//   });

//   //정지, 재생버튼
//   $(".control .the_stop").click(function () {
//     onplay = false;
//     $(this).hide();
//     $(this).removeClass("cotr_on");
//     $(".next").off();
//     $(".prev").off();
//     $(".control .the_play").css("display", "block");
//     $(".play_on").removeClass("play_on");
//     $(".next").removeClass("play_on");
//     $(".prev").removeClass("play_on");
//   });

//   $(".control .the_play").click(function () {
//     onplay = true;
//     $(this).hide();
//     $(this).addClass("cotr_on");
//     $(".next").on("click", function () {
//       click_right();
//     });
//     $(".prev").on("click", function () {
//       click_left();
//     });
//     $(".control .the_stop").css("display", "block");
//     $(".slide_btns .control").addClass("play_on");
//     $(".next").addClass("play_on");
//     $(".prev").addClass("play_on");
//   });


//   //중요. 처음 페이지 로딩 후 셋 인터벌 작동. 인터벌 보다 적게. 즉, 페이드 되는 멈춰있는 시간 - 바뀌는 시간(1초)
//   var thefades = setTimeout(function () {
//     fade();
//     thefades2 = setInterval(fade, 6000);
//   }, 5000);

//   //도트에 마우스 오버 시 자동 멈춤 기능
//   $(".play_on").hover(
//     function () {
//       clearTimeout(thefades);
//       clearInterval(thefades2);
//     },
//     function () {
//       thefades = setTimeout(function () {
//         fade();
//         thefades2 = setInterval(fade, 6000);
//       }, 5000);
//     });
// });


$('.main_vs').slick({
  variableWidth: false,
  dots: true,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: false,
  pauseOnHover: false,
  fade: true, //페이드
  responsive: [{
    breakpoint: 768,
    settings: {
      variableWidth: false,
    }
  }
  ]
});

$('.preview__sldie').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  dots: true,
  infinite: true,
  autoplay: false,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 768,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
  ]
});


$('.talk__slide').slick({
  centerMode: true, //센터모드
  variableWidth: true, // 넓이
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: false,
  pauseOnHover: false,
  responsive: [{
    breakpoint: 768,
    settings: {
      centerMode: false, //센터모드
      variableWidth: false
    }
  }
  ]
});

// 영상팝업
const vodPopup = document.querySelector(".vodPopup");
const vodBox = document.querySelector(".vodPopup__box");
const vodButton = document.querySelectorAll(".view_vod a");
const vodClose = document.querySelector(".vodPopup__close");

vodButton.forEach(btn => {
  btn.addEventListener("click", (e) => {
    vodPopup.classList.add("open");
    let vodLink = btn.getAttribute("href");
    let linkString = vodLink.substring(vodLink.indexOf('?v=') + 3);
    console.log(linkString);
    let createIframe = document.createElement("iframe");
    createIframe.src = `https://www.youtube.com/embed/${linkString}?rel=0&amp;autoplay=1&amp;enablejsapi=1&amp;loop=1&playlist=${linkString}`;
    vodBox.appendChild(createIframe);
    e.preventDefault();
  })
});

vodClose.addEventListener("click", () => {
  let removeVod = vodBox.querySelector("iframe");
  removeVod.remove();
  vodPopup.classList.remove("open");
})


  // $('.review__slide').slick({
  //   slidesToShow: 3,
  //   slidesToScroll: 1,
  //   dots: false,
  //   infinite: true,
  //   autoplay: false,
  //   autoplaySpeed: 4000,
  //   speed: 1200,
  //   arrows: true,
  //   pauseOnHover: false,
  //   responsive: [{
  //     breakpoint: 768,
  //     settings: {
  //       slidesToShow: 2,
  //       slidesToScroll: 1
  //     }
  //   }
  //   ]
  // });



  // window.onload = function () {

  //   function appendBtn() {
  //     const reviewBtns = document.querySelectorAll(".review .slick-arrow");
  //     const btnWrap = document.querySelector(".review__btns");
  //     reviewBtns.forEach(btns => {
  //       btnWrap.appendChild(btns);
  //     });
  //   };
  //   appendBtn();
  //   window.addEventListener("resize", () => {
  //     appendBtn();
  //   })
  // };


  // 백그라운드 무브
  // let lessonBg = document.querySelector(".lesson");
  // window.addEventListener("scroll", () => {
  //   let lessonHeight = lessonBg.offsetHeight;
  //   let winScroll = window.scrollY / 3 - lessonHeight - 70;
  //   lessonBg.style.backgroundPosition = `top -${winScroll}px center`;

  //   console.log(lessonHeight);
  // })