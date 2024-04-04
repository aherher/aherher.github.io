//pc화면 메뉴 오버
// $(".menu").hover(function () {
//   $(".gsub").show();
//   $(".head_bg").show();
// }, function () {
//   $(".gsub").removeAttr("style");
//   $(".head_bg").removeAttr("style");
// });

//모바일 메뉴
var mob_open = false;
$(".gnb_wrap").click(function () {
  if (mob_open == false) {
    // $(".menu").addClass("menuOn");
    $(".menu_close").show();
    $(".menu_btn").hide();
    $(".menu").slideDown(500);
    $(".black_bg").fadeIn(500);
    mob_open = true;
  } else if (mob_open == true) {
    closeMenu();
  }
});

function closeMenu() {
  $(".menu_close").hide();
  $(".menu_btn").show();
  $(".menu").slideUp(500);
  $(".black_bg").fadeOut(500);
  mob_open = false;
};

$(".scrollTops").click(function () {
  var pageTop = $($(this).attr("href")).offset().top;
  $("body, html").animate({ scrollTop: pageTop + "px" }, 500);
  $(".main_section").removeClass("active");
  $($(this).attr("href")).addClass("active");
  closeMenu();
  return false;
});

//모바일 서브메뉴
// $(".menu_m > li > a").click(function () {
//   $(".sub_menus").slideUp();
//   $(".menu_m > li").removeClass("opened");
//   if ($(this).next(".sub_menus").css("display") == "none") {
//     $(this).next(".sub_menus").slideDown(300);
//     $(this).parent("li").addClass("opened");
//   };
//   return false;
// });



$(window).resize(function () {
  if ($(window).width() >= 910 && $(".menu_mwrap").css("display") == "block") {
    close_menu();
  };
});

var window_height;

// 애니메이션 효과
function doAnimation() {
  var windowScroll = $(window).scrollTop();

  $(".unMove").each(function () {
    var unMove_top = $(this).offset().top;
    if ($(window).width() > 960) {
      var window_height = $(window).height() / 2;
    } else if ($(window).width() < 960) {
      var window_height = $(window).height() / 1.3;
    };
    var scolling = windowScroll + window_height + 100;
    console.log(window_height);

    if (unMove_top <= scolling) {
      $(this).addClass("moveOn");
    };
  });
};

function doAnimation2() {
  var windowScroll = $(window).scrollTop();

  if ($(window).width() < 1200) {
    $(".moverWrap").each(function () {
      var unMove_top = $(this).offset().top;
      if ($(window).width() > 960) {
        var window_height = $(window).height() / 2;
      } else if ($(window).width() < 960) {
        var window_height = $(window).height() / 1.3;
      };
      var scolling = windowScroll + window_height;

      if (unMove_top <= scolling) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
      };
    });
  };

};




$(window).load(function () {
  doAnimation();
  doAnimation2();
});



$(window).scroll(function () {
  doAnimation();
  doAnimation2();

});


// $(".select_wrap > span").click(function () {
//   if ($(".sub_sel").css("display") == "none") {
//     $(".sub_sel").slideDown(500);
//   } else {
//     $(".sub_sel").slideUp(500);
//   };
// });