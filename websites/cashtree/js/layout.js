if (navigator.userAgent.indexOf('Trident') > 0) {
  location.href = "microsoft-edge:" + location.href;
  alert('익스플로러 브라우저가 지원종료 되었습니다. 새로 열린 엣지 브라우저를 확인해주세요.');
  setTimeout(close);
};

const header = document.querySelector(".header");
const menuBtn = document.querySelector(".header__menu_btn");
const menuWrap = document.querySelector(".header__menuWrap");
const menus = document.querySelectorAll(".header__menu > li");
let windowWidth = window.innerWidth;

// 클릭
menus.forEach(item => {
  const linker = item.querySelector("a");
  item.addEventListener("click", (e) => {
    const anker = document.querySelector(linker.getAttribute("href"));;
    let headHeader = header.offsetHeight; //헤더 높이
    let totalTop = anker.offsetTop - headHeader; //해당 top - 헤더 높이. 최총 위치
    console.log(headHeader);
    window.scroll({ //윈도우 스크롤
      top: totalTop,
      behavior: 'smooth' //스무스 스크롤
    });
    menuBtn.classList.remove("close_btn");
    menuWrap.classList.remove("active");
    e.preventDefault();
  });
})


// 모바일 메뉴 열기
menuBtn.addEventListener("click", function () {
  menuBtn.classList.toggle("close_btn");
  menuWrap.classList.toggle("active");
});

// 모바일 메뉴 닫기




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


// 개인정보취급방침
const footBtn = document.querySelector(".footer__btn");
const prav = document.querySelector(".prav");
const prav_bg = document.querySelector(".prav__bg");

footBtn.addEventListener("click", () => {
  prav.classList.add("view");
})

prav_bg.addEventListener("click", () => {
  prav.classList.remove("view");
})



// 스크롤 애니메이션
const moverWrap = document.querySelectorAll(".moverWrap")
const unMove = document.querySelectorAll(".unMove")


function doScroll() {
  let windowHeight = window.innerHeight / 1.5
  moverWrap.forEach((item) => {
    let itemTop = item.getBoundingClientRect().top
    if (windowHeight > itemTop) {
      item.classList.add("moverOn_Wrap")
    }
  })

  unMove.forEach((item) => {
    let unMoveTop = item.getBoundingClientRect().top
    if (windowHeight > unMoveTop) {
      item.classList.add("moveOn")
    }
  })

}

window.onload = () => {
  doScroll()
}

window.addEventListener("scroll", function () {
  doScroll()
})
