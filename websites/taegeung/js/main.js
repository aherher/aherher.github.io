const objects = document.querySelectorAll(".bgObject")

window.addEventListener("scroll", () => {
  let winTop = window.scrollY
  let objmove = winTop / 3
  objects.forEach((item) => {
    let checkMove = item.classList.contains("moveOn")
    console.log(checkMove)
    item.style.transform = `translateY(-${objmove}px)`
  })
})

const slideImgs = document.querySelectorAll(".slide > li");
const imgLength = slideImgs.length - 1;
const slideArrows = document.querySelectorAll(".arrs > li");
const dots = document.querySelectorAll(".dots > li");
const stopBtns = document.querySelectorAll(".thestop");
let i = 0;

slideImgs[i].classList.add("current");
dots[i].classList.add("dot_on");


slideArrows.forEach(arr => {
  arr.addEventListener("click", () => {
    const right = arr.classList.contains("next");
    const left = arr.classList.contains("prev");
    fadeOut();

    //우클릭
    if (right && i < imgLength) {
      i++;
    } else if (right && i >= imgLength) {
      i = 0;
    };

    //좌클릭
    if (left && i > 0) {
      i -= 1;
    } else if (left && i == 0) {
      i = imgLength;
    };

    fadeIn();
  });
});


function fadeOut() {
  slideImgs.forEach((arr) => {
    arr.classList.remove("current");
  });
  dots.forEach((dotColor) => {
    dotColor.classList.remove("on");
  });
};

function fadeIn() {
  slideImgs[i].classList.add("current");
  dots[i].classList.add("on");
};

// 도트 클릭
dots.forEach((event, index) => {
  event.addEventListener("click", () => {
    fadeOut();
    i = index;
    fadeIn();
  });
});

// 자동
let setTime = 4000;

let autoFade = setInterval(autofunctions, setTime);

function autofunctions() {
  if (i < imgLength) {
    i++;
  } else if (i >= imgLength) {
    i = 0;
  };
  fadeOut();
  fadeIn();
};


// 멈춤기능
stopBtns.forEach(arr => {
  arr.addEventListener("mouseenter", () => {
    clearInterval(autoFade);
  });
  arr.addEventListener("mouseleave", () => {
    autoFade = setInterval(autofunctions, setTime);
  });
});