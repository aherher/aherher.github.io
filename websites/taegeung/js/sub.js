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
const currentDepth = document.querySelector(".sub_visual h2").textContent;
const leftitle = document.querySelector(".subLinks__leftLink .cur_page span");

// 우측
const subList = document.querySelector(thisPage);
const rightList = document.querySelector(".subLinks__rightLink");
const currentPage = document.querySelector(".sub_page").textContent;
const rightTitle = document.querySelector(".subLinks__rightLink .cur_page span");

leftitle.textContent = currentDepth;
rightTitle.textContent = currentPage;
rightList.appendChild(subList);

// 제품소개 탭기능
const product_tabs = document.querySelectorAll(".product_tabs li");
const product_area = document.querySelectorAll(".product_areaWrap");

function removeActive() {
  product_area.forEach(area => {
    area.classList.remove("show");
  });


  product_tabs.forEach(tab => {
    tab.classList.remove("on");
  });
}

product_tabs.forEach(tab => {
  tab.addEventListener("click", (e) => {
    let tabLink = document.querySelector(e.target.getAttribute("href"));
    removeActive();
    tab.classList.add("on");
    tabLink.classList.add("show");
    e.preventDefault();
  })
});


const partBtn = document.querySelectorAll(".partBtn li");
const tableScroll = document.querySelectorAll(".tableScroll");


function switching() {
  partBtn.forEach(part => {
    part.classList.remove("current");
  });

  tableScroll.forEach(table => {
    table.classList.add("hide");
  });
};

partBtn.forEach(part => {
  part.addEventListener("click", (e) => {
    switching();
    let otherPart = document.querySelector(e.target.getAttribute("href"));
    part.classList.add("current");
    otherPart.classList.remove("hide");
    e.preventDefault();
  })
});