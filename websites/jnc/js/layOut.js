$(document).ready(function(e) {
  var win_width = $(window).width();
  var win_height = $(window).height();

  //리사이징
  $(window).resize(function() {
    $(".intro_Wrap").css("height", $(window).height());
  });


  // 메뉴
  $(".Mmenu_btn").click(function() { //메뉴 열기
    $(".fix_area").show();
    $(".Mmenu_Wrap").animate({
      marginRight: 0
    }, 300);
    $(".Mmenu_btn").css("display", "none");
    $(".Mmenu_close").css("display", "block");

    $("body").css("height", $(window).height());
    $("body").css("overflow", "hidden");
  });

  $(".Mmenu > li > a").click(function() {
    var sub_menu = $(this).parent("li").find(".sub_menu");

    if ($(sub_menu).css("display") == "none") {
      $(".sub_menu").slideUp(300);
      $(sub_menu).slideDown(300);
      return false;
    } else if ($(sub_menu).css("display") == "block") {
      $(sub_menu).slideUp(300);
      return false;
    };
  });



  function Mmenu_close() {
    $(".Mmenu_Wrap").animate({
      marginRight: -600
    }, 300, function() {
      $(".fix_area").removeAttr("style");
    });
    $(".Mmenu_btn").css("display", "block");
    $(".Mmenu_close").css("display", "none");
    $(".Mabout_list").slideUp();

    $("body").removeAttr("style");
  };

  $(".Mmenu_close").click(function() { //메뉴닫기
    Mmenu_close();
  });

  $(window).resize(function (){
    if($(window).width() >= 1080 && $(".fix_area").css("display") == "block") {
        Mmenu_close();
    };
  });



  //work
  $(".sub_sel").change(function() {
    var the_val = $(this).find("option:selected").text();
    $(this).parent(".select_wrap").find("span").text(the_val);
  });

  //top 버튼
  $(".go_top").hide();
  $(window).scroll(function() {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 150) {
      $(".go_top").fadeIn(300);
    } else if (scrollTop < 150) {
      $(".go_top").fadeOut(300);
    };
  });
  $(".go_top").click(function() {
    $(window).scrollTop(0);
    return false;
  });

});

$(document).on("contextmenu dragstart selectstart",function(e){
            return false;
        });
