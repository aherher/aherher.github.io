if (navigator.userAgent.indexOf('Trident') > 0) {
  location.href = "microsoft-edge:" + location.href;
  alert('익스플로러 브라우저가 지원종료 되었습니다. 새로 열린 엣지 브라우저를 확인해주세요.');
  setTimeout(close);
};


const header = document.querySelector(".header");
const menuBtn = document.querySelector(".header__menu_btn");
const menuWrap = document.querySelector(".header__menuWrap");
const menus = document.querySelectorAll(".header__menu > li");
const Submenu = document.querySelectorAll(".header__sub_menu");
const headerBg = document.querySelector(".header__Bg");
let windowWidth = window.innerWidth;

// pc 메뉴열기
menuWrap.addEventListener("mouseenter", () => {
  Submenu.forEach(hover => {
    hover.classList.add("pcOn");
  });
  headerBg.classList.add("view");
});

header.addEventListener("mouseleave", () => {
  Submenu.forEach(hover => {
    hover.classList.remove("pcOn");
  });
  headerBg.classList.remove("view");
});


// 모바일 메뉴 열기
const body_html = document.querySelector("html");
menuBtn.addEventListener("click", function () {
  menuBtn.classList.toggle("close_btn");
  menuWrap.classList.toggle("active");
  body_html.classList.toggle("hiddenHtml");
  closeSub();
});

// 모바일 서브메뉴 열기
menus.forEach((arr, event) => {
  const linker = arr.querySelector("a");
  linker.addEventListener("click", (event) => {
    if (windowWidth <= 1200) {
      event.preventDefault(linker);
      let subCheck = arr.classList.contains("on");
      if (subCheck) {
        arr.classList.remove("on");
      } else {
        closeSub();
        arr.classList.add("on");
      };
    };
  });
});


// 모바일 서브메뉴 닫기
function closeSub() {
  menus.forEach(item => {
    item.classList.remove("on");
  });
}

// 리사이징
window.addEventListener("resize", () => {
  windowWidth = window.innerWidth;
  let menuCurrent = menuWrap.classList.contains("active");
  if (windowWidth >= 1200 && menuCurrent) {
    closeSub();
    menuBtn.classList.remove("close_btn");
    menuWrap.classList.remove("active");
  };
});


// 애니메이션 효과
function doAnimation() {
  var windowScroll = $(window).scrollTop();

  $(".unMove").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 1.3;
    var scolling = windowScroll + window_height + 100;

    if (unMove_top <= scolling) {
      $(this).addClass("moveOn");
    };
  });
};


function doAnimation2() {
  var windowScroll = $(window).scrollTop();

  $(".moverWrap").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 1.3;
    var scolling = windowScroll + window_height;

    if (unMove_top <= scolling) {
      $(this).addClass("moverOn_Wrap");
    };
  });
};

$(window).on("load", function () {
  doAnimation();
  doAnimation2();
});



$(window).scroll(function () {
  doAnimation();
  doAnimation2();
});