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
const currentDepth = document.querySelector(".pageNav span:nth-child(2)").textContent;
const leftitle = document.querySelector(".subLinks__leftLink .cur_page span");
const leftTab = document.querySelectorAll(".subLinks__leftLink .il_left > li");

// 우측
const subList = document.querySelector(thisPage);
const rightList = document.querySelector(".subLinks__rightLink");
const currentPage = document.querySelector(".sub_head h2").textContent;
const rightTitle = document.querySelector(".subLinks__rightLink .cur_page span");
const rightTab = subList.querySelectorAll("li");


leftitle.textContent = currentDepth;
rightTitle.textContent = currentPage;
rightList.appendChild(subList);
leftTab[leftIndex].classList.add("active");
console.log(rightTab);
rightTab[rightIndex].classList.add("active");


