
//pc화면 메뉴 오버
$(".menu > li").hover(function () {
  $(".gsubWrap").hide();
  $(this).find(".gsubWrap:not(:animated)").show();
  $(".hoverBg:not(:animated)").show();
});

$(".menu_wrap").mouseleave(function () {
  $(".gsubWrap").hide();
  $(".hoverBg").hide();
});

///메뉴
function close_menu() {
  $(".close_btn").hide();
  $(".menu_btn").show();
  $(".menu_mwrap").fadeOut(300);
  $("html, body").removeAttr("style");
};

//모바일 메뉴
$(".menu_btn").click(function () {
  $(".menu_mwrap").fadeIn(300);
  $(this).hide();
  $(".close_btn").show();
  // $(".header_wrap").addClass("on_mob");
  // $(".menu_close").css("display", "inline-block");
  // $(".menu_btn").hide();
  $("html, body").css("overflow", "hidden");
  //  $(".menu_mwrap")
});

// 모바일 서브메뉴
$(".menu_m > li > a").click(function () {
  if ($(this).parent("li").find(".sub_menus").css("display") == "none") {
    $(".sub_menus").slideUp(200);
    $(this).parent("li").find(".sub_menus").slideDown(300);
    $(".menu_m > li").removeClass("opened");
    $(this).parent("li").addClass("opened");
    return false;
  } else if ($(this).parent("li").find(".sub_menus").css("display") == "block") {
    $(".sub_menus").slideUp(200);
    $(".menu_m > li").removeClass("opened");
    $(".mob_inner").slideUp(200);
    return false;
  };
});

$(".close_btn").click(function () {
  close_menu();
});

$(".sub_menus > li > a").click(function () {
  close_menu();
});


$(window).resize(function () {
  if ($(window).width() > 1080 && $(".menu_mwrap").css("display") == "block") {
    close_menu();
  };
});




// 탑버튼
$(".goTop").click(function () {
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


$("#tab01").show();
$(".subTabs li a").click(function () {
  $(".hidden").hide();
  $($(this).attr("href")).show();

  $(".subTabs li").removeClass("on");
  $(this).parent("li").addClass("on");
  return false;
});
