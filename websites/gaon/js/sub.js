// 서브탭
const subTab = document.querySelectorAll(".cur_page");
const tabsList = document.querySelectorAll(".subLinks__List");

subTab.forEach(arr => {
  arr.addEventListener("click", () => {
    const nextList = arr.nextElementSibling;
    const onOff = nextList.classList.contains("listOpen");
    if (!onOff) {
      arr.classList.add("openedTab");
      nextList.classList.add("listOpen");
    } else {
      arr.classList.remove("openedTab");
      nextList.classList.remove("listOpen");
    };
  });
});


// 각 페이지별
// 좌측
const currentDepth = document.querySelector(".subVisual dl dt").textContent;
const leftitle = document.querySelector(".subLinks__leftLink .cur_page span");

// 우측
const subList = document.querySelector(thisPage);
const rightList = document.querySelector(".subLinks__rightLink");
const currentPage = document.querySelector(".pageTitle").textContent;
const rightTitle = document.querySelector(".subLinks__rightLink .cur_page span");

leftitle.textContent = currentDepth;
rightTitle.textContent = currentPage;
rightList.appendChild(subList);

// 우측 네비
const rightNav = document.querySelectorAll(".pageNav li");

rightNav.forEach((nav, index) => {
  if (index == 1) {
    nav.textContent = currentDepth;
  } else if (index == 2) {
    nav.textContent = currentPage;
  }
  // nav[1].textContent = currentDepth;
  // nav[2].textContent = currentPage;
});


// 평면정보 탭기능
const truetabs = document.querySelectorAll(".trueTabs li");
const hide = document.querySelectorAll(".hide");

document.querySelector("#tab01").classList.remove("hide");

function remover() {
  hide.forEach(hidebox => {
    hidebox.classList.add("hide");
  });

  truetabs.forEach(btns => {
    btns.classList.remove("on")
  });
};


truetabs.forEach(tab => {
  let tabLinker = tab.querySelector("a");
  tab.addEventListener("click", (e) => {
    remover();
    tab.classList.add("on");

    let showLink = e.target.getAttribute('href');
    document.querySelector(showLink).classList.remove("hide");
    e.preventDefault(tabLinker);
  });
});