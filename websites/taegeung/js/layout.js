if (navigator.userAgent.indexOf("Trident") > 0) {
  location.href = "microsoft-edge:" + location.href
  alert(
    "익스플로러 브라우저가 지원종료 되었습니다. 새로 열린 엣지 브라우저를 확인해주세요."
  )
  setTimeout(close)
}


// 헤더
const header = document.querySelector(".header");

header.addEventListener("mouseenter", () => {
  let checkAll = header.classList.contains("openAll");
  let checkMobile = header.classList.contains("forMobile");
  if (!checkAll && !checkMobile) {
    header.classList.add("hovered");
  }
})

header.addEventListener("mouseleave", () => {
  header.classList.remove("hovered");
})

// 모바일 헤더
const menus = document.querySelectorAll(".header__menu > li > a");
const submenu = document.querySelectorAll(".header__submenu");
const menuBtn = document.querySelector(".header__menubtn");
const closeBtn = document.querySelector(".header__close");
const body = document.querySelector("body");

function closemob_sub() {
  submenu.forEach(sub => {
    sub.classList.remove("mobileOn")
  })
  menus.forEach(menus => {
    menus.classList.remove("on")
  })
}

menus.forEach(menu => {
  menu.addEventListener("click", (e) => {
    let windowWidth = window.innerWidth;
    let checkOn = menu.classList.contains("on");
    if (windowWidth <= 960 && !checkOn) {
      closemob_sub();
      let subMenu = menu.closest("li").querySelector(".header__submenu");
      menu.classList.add("on")
      subMenu.classList.add("mobileOn");
      e.preventDefault();
    } else if (windowWidth <= 960 && checkOn) {
      closemob_sub();
      e.preventDefault();
    }
  });
});


// 전체메뉴
const allMenu = document.querySelector(".allMenu");
const allMenus_list = document.querySelectorAll(".allMenu__menus li");
const allSubmenu = document.querySelectorAll(".allMenu__subMenu");

// 메뉴 열기
menuBtn.addEventListener("click", () => {
  let windowWidth = window.innerWidth;
  if (windowWidth >= 960) {
    header.classList.remove("hovered");
    header.classList.add("openAll");
    allMenu.classList.add("viewAll");
  } else if (windowWidth <= 960) {
    header.classList.remove("hovered");
    header.classList.add("forMobile");
    body.style.overflow = "hidden";
  }

});

closeBtn.addEventListener("click", () => {
  header.classList.remove("hovered");
  header.classList.remove("openAll");
  header.classList.remove("forMobile");
  allMenu.classList.remove("viewAll");
  body.style = "";
});

function removeClass() {
  allMenus_list.forEach(item => {
    item.classList.remove("menuon")
  })
  allSubmenu.forEach(sub => {
    sub.style.display = "none";
  })
}

allMenus_list.forEach((item, index) => {
  item.addEventListener("mouseenter", () => {
    removeClass();
    item.classList.add("menuon");
    allSubmenu[index].style.display = "block";
  })
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
