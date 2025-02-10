$(document).ready(function(e) {

  // 모바일 메뉴
  $(".Mmenu_btn").click(function() { //메뉴 열기
    $(".fix_area").show().animate({
      right: 0
    }, 300);
    //$(".menu_mob").animate({right:0}, 300);
    $(".Mmenu_btn").css("display", "none");
    $(".Mmenu_close").css("display", "block");

    $("body").css("height", $(window).height());
    $("body").css("overflow", "hidden");
  });

  function the_close() {
    //$(".menu_mob").animate({right:-600 + "px"}, 300, function (){$(".fix_area").hide();});
    $(".fix_area").animate({
      right: -600 + "px"
    }, 300, function() {
      $(".fix_area").removeAttr("style");
    });
    $(".Mmenu_btn").show();
    $(".Mmenu_close").removeAttr("style");

    $("body").css("height", "auto");
    $("body").css("overflow", "auto");
  };

  $(".Mmenu_close").click(function() {
    the_close();
  });

  $(window).resize(function(){
    if($(window).width() > 850 && $(".fix_area").css("display") == "block") {
      the_close();
    };
  });

  //서브메뉴 열림
  $(".Mmenu > li > a").click(function (){
    var sub_menu = $(this).parent("li").find(".sub_menus");

	 if($(sub_menu).css("display") == "none") {
	   $(".sub_menus").slideUp(300);
	   $(sub_menu).slideDown(300);
	 } else {
	   $(".sub_menus").slideUp(300);
		 };
	return false;
	});


});
