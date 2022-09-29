
//모바일 메뉴
var mob = false;

function close_mobile() {
  $(".web_header").removeClass("header_mobOn", function () {
    $(".web_header").removeAttr("style");
  });
  $(".Mmenu_btn").removeAttr("style");
  $(".Mmenu_close").removeAttr("style");
  $(".menu_gnb").removeAttr("style");
  $("html, body").removeAttr("style");
  $(".web_menu > li").removeClass("opend");
  mob = false;
};

$(".btn_wrap .Mmenu_btn").click(function () {
  $(".web_header").show(1, function () {
    $(".web_header").addClass("header_mobOn");
  });
  $(".Mmenu_btn").hide();
  $(".Mmenu_close").show();
  $("html, body").css("overflow-y", "hidden");
  mob = true;
});

$(".btn_wrap .Mmenu_close").click(function () {
  close_mobile();
});

$(".web_menu > li > a").click(function () {
  if (mob == true) {
    var menu_gnb = $(this).parent("li").find(".menu_gnb").css("display");
    if (menu_gnb == "none") {
      $(".menu_gnb").slideUp(300);
      $(this).parent("li").find(".menu_gnb").slideDown(300);
      $(".web_menu > li").removeClass("opend");
      $(this).parent("li").addClass("opend");
    } else if (menu_gnb == "block") {
      $(this).parent("li").find(".menu_gnb").slideUp(300);
      $(this).parent("li").removeClass("opend");
    };
    return false;
  };
});

$(window).resize(function () {
  if ($(window).width() >= 780 && mob == true) {
    close_mobile();
  };

  if ($(window).width() <= 780 && sitemap == true) {
    close_sitemap();
  };
});

//모바일 로그인 메뉴
var log_btns = $(".mobile_longin li").length;
var btn_width = 100 / log_btns - 2 + '%';
$(".mobile_longin > li").css("width", btn_width);

//메뉴 스크롤시
$(window).scroll(function () {
  var win_h = $(window).scrollTop();
  if (win_h > 50) {
    $(".header_wrap").addClass("header_on");
  } else if (win_h < 50) {
    $(".header_wrap").removeClass("header_on");
  };
});

$(".header_wrap").hover(function () {
  if ($(window).scrollTop() < 50) {
    $(".header_wrap").addClass("header_on");
  };
}, function () {
  if ($(window).scrollTop() < 50) {
    $(".header_wrap").removeClass("header_on");
  };
});

$(".web_menu").mouseenter(function () {
  if ($(".btn_wrap").css("display") == "none") {
    $(".web_header").addClass("hover_on");
    // $(".web_header").css("height", 175 + "px");
    $(".menu_gnb").stop().slideDown(300);
  };
});

$(".header_wrap").mouseleave(function () {
  if ($(".btn_wrap").css("display") == "none") {
    // $(".web_header").removeAttr("style");
    $(".web_header").removeClass("hover_on");
    $(".menu_gnb").stop().slideUp(300);
  };
});

// $(".web_menu").hover(function () {
//   if ($(".btn_wrap").css("display") == "none") {
//     $(".web_header").css("height", 160 + "px");
//     $(".menu_gnb").stop().slideDown(300);
//   };
// }, function () {
//   if ($(".btn_wrap").css("display") == "none") {
//     $(".web_header").removeAttr("style");
//     $(".menu_gnb").stop().slideUp(300);
//   };
// });