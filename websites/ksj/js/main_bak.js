// 스토리 슬라이드
const slideImgs = document.querySelectorAll(".story__slide > li");
const imgLength = slideImgs.length - 1;
const slideArrows = document.querySelectorAll(".arrs");
const thumWrap = document.querySelector(".story__thum");
let thum = document.querySelectorAll(".story__thum > li");
const thum_prev = document.querySelector(".thum_prev");
const thum_next = document.querySelector(".thum_next");
const stopBtns = document.querySelectorAll(".thestop");
let i = 0;


slideArrows.forEach(arr => {
  arr.addEventListener("click", () => {
    const right = arr.classList.contains("rightarr");
    const left = arr.classList.contains("leftarr");
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
};

function fadeIn() {
  slideImgs[i].classList.add("current");
};

// 썸네일 클릭
function removeThum() {
  thum.forEach(event => {
    event.classList.remove("thumOn");
  });
}

thum.forEach((event, index) => {
  event.addEventListener("click", () => {
    fadeOut();
    removeThum();
    event.classList.add("thumOn");
    i = index;
    fadeIn();
  });
});

// 초기위치설정
let thumheight = thum[0].offsetHeight;
thumWrap.insertBefore(thum[thum.length - 1], thum[0]);
thumWrap.style.transform = `translateY(${-thumheight}px)`;

thum_next.addEventListener("click", () => {
  thumheight = thum[0].offsetHeight;
  thumWrap.classList.add("moveing");
  thumWrap.style.transform = `translateY(${thumheight}px)`;
  setTimeout(() => {
    thum = document.querySelectorAll(".story__thum > li");
    thumWrap.appendChild(thum[0]);
    thumWrap.style.transform = `translateY(${-thumheight}px)`;
    thumWrap.classList.remove("moveing");
  }, 500);
})

thum_prev.addEventListener("click", () => {
  thumheight = thum[0].offsetHeight;
  thumWrap.classList.add("moveing");

  thumWrap.style.transform = `translateY(${-thumheight * 2}px)`;
  setTimeout(() => {
    thum = document.querySelectorAll(".story__thum > li");
    thumWrap.insertBefore(thum[thum.length - 1], thum[0]);
    thumWrap.style.transform = `translateY(${-thumheight}px)`;
    thumWrap.classList.remove("moveing");
  }, 500);
})

//썸네일 화살표 클릭


// 자동
// let setTime = 3000;

// let autoFade = setInterval(autofunctions, setTime);

// function autofunctions() {
//   if (i < imgLength) {
//     i++;
//   } else if (i >= imgLength) {
//     i = 0;
//   };
//   fadeOut();
//   fadeIn();
// };


// 멈춤기능
stopBtns.forEach(arr => {
  arr.addEventListener("mouseenter", () => {
    clearInterval(autoFade);
  });
  arr.addEventListener("mouseleave", () => {
    autoFade = setInterval(autofunctions, setTime);
  });
});