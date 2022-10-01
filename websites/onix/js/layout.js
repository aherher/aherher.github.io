$(window).scroll(function () {
  var winTop = $(window).scrollTop();

  if (winTop > 50) {
    $(".header_wrap").addClass("header_on");
  } else if (winTop < 50) {
    $(".header_wrap").removeClass("header_on");
  };
});

$(".menu_btn").click(function () {
  $(".menu_wrap").fadeIn(500);
  $("html, body").css("overflow", "hidden");
});


$(".close_btn").click(function () {
  $(".menu_wrap").fadeOut(500, function () {
    $(this).removeAttr("style");
  });
  $("html, body").removeAttr("style");
});

$(".menu > li > a").click(function () {
  var sub_menu = $(this).parent("li").find(".sub_menu");
  if ($(sub_menu).css("display") == "none") {
    $(".sub_menu").slideUp(300);
    $(sub_menu).slideDown(300);
    return false;
  } else if ($(sub_menu).css("display") == "block") {
    $(".sub_menu").slideUp(300);
    return false;
  }
});
