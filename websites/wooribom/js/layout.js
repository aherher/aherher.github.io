if (navigator.userAgent.indexOf('Trident') > 0) {
  location.href = "microsoft-edge:" + location.href;
  alert('익스플로러 브라우저가 지원종료 되었습니다. 새로 열린 엣지 브라우저를 확인해주세요.');
  setTimeout(close);
};

const menuBtn = document.querySelector(".header__menu_btn");
const menuWrap = document.querySelector(".header__menuWrap");
const menus = document.querySelectorAll(".header__menu > li");
const Submenu = document.querySelectorAll(".header__sub_menu");
let windowWidth = window.innerWidth;

// 모바일 메뉴 열기
menuBtn.addEventListener("click", function () {
  menuBtn.classList.toggle("close_btn");
  menuWrap.classList.toggle("active");
  closeSub();
});

// 모바일 서브메뉴 열기
menus.forEach((arr, event) => {
  arr.addEventListener("click", (event) => {
    if (windowWidth <= 1200) {
      const linker = arr.querySelector("a");
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

// 윈도우 스크롤시 헤더
window.addEventListener("scroll", () => {
  let WindowscrollTop = document.querySelector("html, body").scrollTop;
  let header = document.querySelector(".header");
  if (WindowscrollTop > 100) {
    header.classList.add("header_on");
  } else if (WindowscrollTop < 100) {
    header.classList.remove("header_on");
  };
});

const menuDl = document.querySelector(".header__dl");
const haderBg = document.querySelector(".header__bg");
const header = document.querySelector(".header");

menuWrap.addEventListener("mouseenter", () => {
  if (windowWidth >= 768) {
    header.classList.add("headerOn");
  }
});

header.addEventListener("mouseleave", () => {
  if (windowWidth >= 768) {
    header.classList.remove("headerOn");
  }
});