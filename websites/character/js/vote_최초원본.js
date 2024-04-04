// 지역별 캐릭터 선택
const area = document.querySelectorAll(".voteArea__map a");
const charactors = document.querySelectorAll(".voteArea__select");

function revmover() {
  for (let b of area) {
    b.classList.remove("current");
  };

  for (let c of charactors) {
    c.classList.remove("active");
  };
}

area.forEach(btn => {
  btn.addEventListener("click", (e) => {
    revmover();
    btn.classList.add("current");
    let linker = document.querySelector(btn.getAttribute("href"));
    linker.classList.add("active");
    e.preventDefault();
  });
});


// 캐릭터 선택시 표기
const choose = document.querySelectorAll(".choose");
const listsBox = document.querySelector(".selected__lists");

choose.forEach(c => {
  c.addEventListener("click", (e) => {
    const cloneElement = document.querySelector(".clone li").cloneNode(true);
    let listsBox_li = document.querySelectorAll(".selected__lists li");
    let char_length = listsBox_li.length;
    let parent = c.closest("li");
    let chooseImg = parent.querySelector(".selectTop__img img").cloneNode(true);
    let chooseTitle = parent.querySelector(".selectBottom__title").textContent;
    let chooseAddress = parent.querySelector(".selectBottom__address").textContent;
    let clonedTitle = parent.className;
    let checkClassName = parent.classList.contains("checked");
    parent.classList.add("checked");

    // listsBox_li.forEach(checkClass =>{
    //    checkClassName = checkClass.classList.contains(clonedTitle);
    //    console.log(checkClassName)
    // });


    if (char_length == 0 || char_length < 3 && !checkClassName) {
      listsBox.appendChild(cloneElement).classList.add(clonedTitle);
      cloneElement.querySelector(".image").appendChild(chooseImg);
      cloneElement.querySelector(".intxt01").textContent = chooseTitle;
      cloneElement.querySelector(".intxt02").textContent = chooseAddress;
      let aboutBtn = document.querySelectorAll(".popBtn a");
      aboutBtn.forEach(btn => {
        btn.addEventListener("click", (e) => {
          openPop(btn);
          e.preventDefault();
        });
      });

    } else if (char_length >= 3) {
      alert("3가지 이상 투표할 수 없습니다.");
    };

    // 투표취소
    let cancelBtn = document.querySelectorAll(".cancel");
    cancelBtn.forEach(cancel => {
      cancel.addEventListener("click", () => {
        let removeClass = cancel.closest("li").className;
        let find = document.querySelectorAll(`.${removeClass}`);

        find.forEach(finder => {
          finder.classList.remove("checked");
        });

        cancel.closest("li").remove();
      });
    });

    e.preventDefault();

  });
})


// 소개 팝업
let aboutBtn = document.querySelectorAll(".popBtn a");
const closeBtn = document.querySelectorAll(".about__close");
const blckBg = document.querySelectorAll(".blckBg");

function openPop(theBtn) {
  let aboutLink = document.querySelector(theBtn.getAttribute("href"));
  aboutLink.style.display = "block";
  // 팝업 슬라이드
  $('.about__slide').slick({
    dots: false,
    infinite: true,
    autoplay: false,
    autoplaySpeed: 4000,
    speed: 1200,
    arrows: true,
    pauseOnHover: false,
  });
}

aboutBtn.forEach(btn => {
  btn.addEventListener("click", (e) => {
    openPop(btn);
    e.preventDefault();
  });
});

function closePop() {
  const popLayer = document.querySelectorAll(".aboutPop");
  // const popLayer = document.querySelector(e.closest(".aboutPop"));
  popLayer.forEach(layer => {
    layer.style.display = "";
  });
  $('.about__slide').slick("unslick");
};

closeBtn.forEach(close => {
  close.addEventListener("click", () => {
    closePop();
  });
});

blckBg.forEach(blckBg => {
  blckBg.addEventListener("click", () => {
    closePop();
  });
});







