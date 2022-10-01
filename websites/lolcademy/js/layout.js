
//메뉴
$(".menu > li").mouseenter(function () {
  var inner_gsub = $(this).find(".gsub");
  $(".gsub").hide();
  if ($(inner_gsub).css("display") == "none") {
    $(inner_gsub).show();
    $(".gsub_bg").show();
  };
});

$(".menu > li").mouseleave(function () {
  $(".gsub").hide();
  $(".gsub_bg").hide();
});

$(".header_wrap").hover(function () {
  var winTop = $(window).scrollTop();
  if (winTop > 50) {
    $(this).addClass("on_head");
  };
}, function () {
  if (winTop < 50) {
    $(this).removeClass("on_head");
  };
});

function close_menu() {
  $(".menu_mwrap").fadeOut(300);
  $("html, body").removeAttr("style");
};

//모바일 메뉴
$(".menu_btn").click(function () {
  $(".menu_mwrap").fadeIn(300);
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



$(window).resize(function () {
  if ($(window).width() > 1080 && $(".menu_mwrap").css("display") == "block") {
    close_menu();
  };
});


$(".q_top").click(function () {
  $("html, body").animate({ scrollTop: 0 }, 500);
  return false;
});