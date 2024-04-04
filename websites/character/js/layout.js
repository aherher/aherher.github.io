if (navigator.userAgent.indexOf('Trident') > 0) {
  location.href = "microsoft-edge:" + location.href;
  alert('익스플로러 브라우저가 지원종료 되었습니다. 새로 열린 엣지 브라우저를 확인해주세요.');
  setTimeout(close);
};

// 애니메이션 효과
function doAnimation() {
  var windowScroll = $(window).scrollTop();

  $(".unMove").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 1.3;
    var scolling = windowScroll + window_height + 100;

    if (unMove_top <= scolling) {
      $(this).addClass("moveOn");
    };
  });
};


function doAnimation2() {
  var windowScroll = $(window).scrollTop();

  $(".moverWrap").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 1.3;
    var scolling = windowScroll + window_height;

    if (unMove_top <= scolling) {
      $(this).addClass("moverOn_Wrap");
    };
  });
};

$(window).on("load", function () {
  doAnimation();
  doAnimation2();
});



$(window).scroll(function () {
  doAnimation();
  doAnimation2();
});