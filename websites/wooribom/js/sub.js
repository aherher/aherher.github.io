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
const currentDepth = document.querySelector(".subVisual h2").textContent;
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


// 공연리스트 탭기능
const historyTab = document.querySelectorAll(".musicalHistory__tabs > li");
const historyHide = document.querySelectorAll(".musicalHistory__hide");


historyTab.forEach(item => {
  item.addEventListener("click", (event) => {

    for (p of historyTab) {
      p.classList.remove("on");
    }
    item.classList.add("on");

    let getId = document.querySelector(event.target.getAttribute("href"));

    for (c of historyHide) {
      c.classList.remove("show");
    };

    getId.classList.add("show");
    event.preventDefault();

  });
});