


/*$(".header_wrap .menu").hover(function() {
  $('.sub_menu').show();
  $(".menu_bg").show();
}, function() {
  $('.sub_menu').hide();
  $(".menu_bg").hide();
});
*/

//모바일 메뉴 기능
$(".menu_btn").click(function() {
  if ($(".menu_mwrap").css("display") == "none") {
    $(".menu_mwrap").show();
    $(".menu_marea").animate({
      top: 0
    }, 300);
    $(".blck_bg").fadeIn(300);
    $("body, html").css("overflow", "hidden");
    $(this).addClass("close_btn");
  } else {
    $(".menu_marea").animate({
      top: -100 + "%"
    }, function() {
      $(".menu_mwrap").hide();
      $(".sub_menus").hide(0);
      $(".menu_m > li > a").removeClass("opend");
    });
    $(".blck_bg").fadeOut(300);
    $("body, html").css("overflow", "inherit");
    $(this).removeClass("close_btn");
  };
});

//서브메뉴 열림
/*$(".menu_m > li > a").click(function() {
  var sub_menu = $(this).parent("li").find(".sub_menus");

  if ($(sub_menu).css("display") == "none") {
    $(".sub_menus").slideUp(300);
    $(sub_menu).slideDown(300);
    $(".menu_m > li > a").removeClass("opend");
    $(this).addClass("opend");
  } else {
    $(".sub_menus").slideUp(300);
    $(".menu_m > li > a").removeClass("opend");
  };
  return false;
});*/

$(window).resize(function() {
  if ($(window).width() >= 1010) {
    $(".menu_marea").animate({
      top: -100 + "%"
    }, 1);
    $(".menu_mwrap").hide();
    $(".blck_bg").fadeOut(300);
    $("body, html").css("overflow", "inherit");
    $(".menu_btn").removeClass("close_btn");
  };
});

/*퀵메뉴*/
function quick_evt(){
  $(".quick_wrap").fadeIn(500);
  $(".quick_box").animate({right:0}, 500);
  $("html, body").css("overflow", "hidden");
};

$(".quick_btn a").click(function (){
  quick_evt();
  return false;
});
function close_qb(){
  $(".quick_wrap").fadeOut(300);
  $(".quick_box").animate({right:-505+"px"}, 300, function (){
    $(".quick_box").removeAttr("style");
    $("html, body").removeAttr("style");
  });
};

$(".close_quick").click(function (){
  close_qb();
});

$(".qblck_bg").click(function (){
  close_qb();
});

$(".mobq_btn").click(function (){
  quick_evt();
});

//서브 네비
$(".left_links").click(function() {
  if ($(".li_left").css("display") == "none") {
    $(".li_left").slideDown(300);
  } else {
    $(".li_left").slideUp(300);
  };
});
$(".right_links").click(function() {
  if ($(".li_right").css("display") == "none") {
    $(".li_right").slideDown(300);
  } else {
    $(".li_right").slideUp(300);
  };
});

//제품 모바일 탭
$(".mob_current").click(function(){
  if($(".prod_tabs").css("display") == "none") {
    $(".prod_tabs").slideDown(300);
    $(this).addClass("mob_close");
  } else if ($(".prod_tabs").css("display") == "block"){
    $(".prod_tabs").slideUp(300, function (){
      $(".prod_tabs").removeAttr("style");
    })
    $(this).removeClass("mob_close");
  };
});
