//메뉴 스크롤시
$(window).scroll(function () {
  var win_h = $(window).scrollTop();
  if (win_h > 100) {
    $(".header_wrap").addClass("header_on");
  } else if (win_h < 100) {
    $(".header_wrap").removeClass("header_on");
  };
});

//pc화면 메뉴 오버
$(".menu > li").hover(function () {
  if ($(".menu_close").css("display") == "none") {
    $(this).find(".gsub:not(:animated)").slideDown(100);
    $(this).find(".liBg").addClass("opened");
  }
}, function () {
  if ($(".menu_close").css("display") == "none") {
    $(".gsub").slideUp(100);
    $(".liBg").removeClass("opened");
  }
});

//모바일 메뉴
$(".menu_btn").click(function () {
  $(".menu_wrap").show();
  $(".menu_wrap").animate({
    right: 0
  }, 300);
  $(".header_wrap").addClass("on_mob");
  $(".menu_close").show();
  $(".menu_btn").hide();
  $("html, body").css("overflow", "hidden");
  //  $(".menu_mwrap")
});


function close_menu() {
  $(".menu_wrap").animate({
    right: -100 + "%"
  }, 300, function () {
    $(".menu_wrap").removeAttr("style");
    $(".header_wrap").removeClass("on_mob");
    $(".menu > li").removeClass("opened");
  });
  $("html, body").removeAttr("style");
  $(".menu_close").removeAttr("style");
  $(".menu_btn").removeAttr("style");
  $(".gsub").removeAttr("style");
};

$(".menu_close").click(function () {
  close_menu();
})


$(".menu > li > a").click(function () {
  if ($(".menu_close").css("display") == "block") {
    if ($(this).next(".gsub").css("display") == "none") {
      $(".gsub").slideUp(300);
      $(this).next(".gsub").slideDown(300);
    } else {
      $(this).next(".gsub").slideUp(300);
    }
    return false;
  };
});


$(window).resize(function () {
  if ($(window).width() >= 930 && $(".menu_close").css("display") == "block") {
    close_menu();
  };
});

$(".go_top").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 500);
  return false;
});




// 애니메이션 효과
function doAnimation() {
  var windowScroll = $(window).scrollTop();

  $(".unMove").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 2;
    var scolling = windowScroll + window_height + 100;
    console.log(window_height);

    if (unMove_top <= scolling) {
      $(this).addClass("moveOn");
    };
  });
};

function doAnimation2() {
  var windowScroll = $(window).scrollTop();

  $(".moverWrap").each(function () {
    var unMove_top = $(this).offset().top;
    var window_height = $(window).height() / 2;
    var scolling = windowScroll + window_height;

    if (unMove_top <= scolling) {
      $(this).addClass("moverOn_Wrap");
    };
  });
};


$(window).load(function () {
  doAnimation();
  doAnimation2();
});



$(window).scroll(function () {
  doAnimation();
  doAnimation2();
});