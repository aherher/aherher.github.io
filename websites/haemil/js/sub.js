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


// 탭버튼 기능
const tab_buttons = document.querySelectorAll(".true_tabs > li");
const tab_contents = document.querySelectorAll(".tab_contents");

function cancel_tab() {
  tab_buttons.forEach(btn => {
    btn.classList.remove("on");
  })
  tab_contents.forEach(contents => {
    contents.classList.add("hide");
  })
}

tab_buttons.forEach(arr => {
  arr.addEventListener("click", (e) => {
    cancel_tab();
    arr.classList.add("on");
    let contents_box = document.querySelector(e.target.getAttribute("href"));
    contents_box.classList.remove("hide");
    e.preventDefault(arr);
  })
})

// faq
const faq_tabs = document.querySelectorAll(".faq__list > li");
const faq_button = document.querySelectorAll(".faq__title");

function close_faq() {
  faq_tabs.forEach(tabs => {
    tabs.classList.remove("on");
  });
}

faq_button.forEach(btn => {
  btn.addEventListener("click", () => {
    close_faq();
    btn.closest("li").classList.toggle("on");
  });
});