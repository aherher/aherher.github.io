$(document).ready(function(e) {
  $(".menu > li").mouseenter(function() {
    $(".sub_menu").hide();
    $(this).find(".sub_menu").show();
    $(".subm_bg").show();
  });
  $(".header_wrap").mouseleave(function() {
    $(".sub_menu").hide();
    $(".subm_bg").hide();
  });


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
  $(".menu_m > li > a").click(function() {
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
  });

  $(window).resize(function() {
    if ($(window).width() >= 1080) {
      $(".menu_marea").animate({
        top: -100 + "%"
      }, 1);
      $(".menu_mwrap").hide();
      $(".blck_bg").fadeOut(300);
      $("body, html").css("overflow", "inherit");
      $(".menu_btn").removeClass("close_btn");
    };
  });

  //마우스 오버시 메뉴
  $(".main_header").hover(function() {
    $(this).addClass("hover_header");
  }, function() {
    $(this).removeClass("hover_header");
  });


  $(".header_wrap .head .menu > li").hover(function() {
    $(".sub_menu").hide();
    $(this).find(".sub_menu").show();
    $(".sub_bg").show();
  });

  $(".header_wrap").mouseleave(function() {
    $(".sub_menu").hide();
    $(".sub_bg").hide()
  });


  //스크롤 시 메인메뉴
  function scroll_header() {
    if ($(window).scrollTop() > 50) {
      $(".main_header").addClass("scrolled");
    } else {
      $(".main_header").removeClass("scrolled");
    };
  };
  scroll_header();

  $(window).scroll(function() {
    scroll_header();
  });

  //메인 슬라이드
  function slide_h() {
    if ($(".slide li .mv_mob").css("display") == "none") {
      var head = $(".header_wrap").height();
      var win_h = $(window).height() - head;
      if($(window).width() > 1300){
        $(".slide_wrap").css("height", win_h);
      } else {
        $(".slide_wrap").css("height", "auto");
      };
    } else {
      $(".slide_wrap").removeAttr("style");
    };
  };
  slide_h();
  $(window).resize(function() {
    slide_h();
  });

  //메인 소개
  if ($(window).width() >= 800) {
    var head = $(".header_wrap").height();
    var win_h = $(window).height() - head;
    $(".introduce").css("height", win_h);
  };



  //메인페이지 팝업
  $(".btns_wrap li a").click(function() {
    window.open(this.href, "", "width=720, height=800, scrollbars=yes, resizable=yes");
    return false;
  });



  //메인 설명회
  $("#ptable01").show();
  $(".plts > li > a").click(function() {
    $(".news_table").hide();
    $($(this).attr("href")).show();
    $(".plts > li").removeClass("pl_on");
    $(this).parent("li").addClass("pl_on");
    return false;
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

  //서브페이지 탭기능
  $("#view01").show();
  $(".true_tabs > li > a").click(function() {
    $(".page_tabs > li").removeClass("pt_on");
    $(this).parent("li").addClass("pt_on");
    $(".hidden_tab").hide();
    $($(this).attr("href")).show();
    return false;
  });

  //강사소개
  var over_layer = '<div class="layer"></div>';
  $(over_layer).prependTo(".teach_img");

  //동영상팝업
  $(".teachers > li").each(function() {
    var movurl = $(this).find("a").attr("href");
    if (!movurl) {
      $(this).find(".vod_btn").hide();
    };
  });
  $(".teachers > li > a").click(function() {
    var movurl = $(this).attr("href");
    if (!movurl) {
      alert("영상 준비중 입니다.");
    } else {
      var iframe = '<iframe width="100%" height="450px" src="' + movurl + '?autoplay=1&rel=0 "frameborder="0" autoplay=1 allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      $(".subpop_vod .inpop_area").show();
      $(iframe).prependTo(".subpop_vod .inpop_area");
      $(".subpop_vod").fadeIn(300);
      //$($(this).attr("href")).show().addClass("current_on");
      //var vods_box = $(".subvod_box");
    };
    return false;
  });

  //팝업닫기
  function close_subpop() {
    $(".subpop_wrap").fadeOut(300, function() {
      $(".inpop_area").hide();
      $(".inpop_area").find("iframe").remove();
      $(".inpop_area").removeClass("current_on");
    });
  };

  $(".subpop_box .close_sp").click(function() {
    close_subpop();
  });

  $(".subpop_wrap .black_bg").click(function() {
    close_subpop();
  });


  //선배들의 공부법
  /*$(".studing > li > a").click(function() {
    var movurl = $(this).attr("href");
    var iframe = '<iframe width="100%" height="450px" src="' + movurl + '?autoplay=1&rel=0 "frameborder="0" autoplay=1 allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    $(".subpop_vod .inpop_area").show();
    $(iframe).prependTo(".subpop_vod .inpop_area");
    $(".subpop_vod").fadeIn(300);
    return false;
  });*/

  //선배들의 공부법
  $(".studing > li > a").click(function() {
    var movurl = $(this).parent("li").children(".vod_src").children("a").attr("href");
    var iframe = '<iframe width="100%" height="450px" src="' + movurl + '?autoplay=1&rel=0" frameborder="0" autoplay=1 allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    var pop_box = $(this).attr("href");
    var inpop_area = $(pop_box).find(".inpop_area");
    $(pop_box).fadeIn(300);
    $(iframe).prependTo(inpop_area);
    $(inpop_area).show();
    return false;
  });

  //시간표 기능
  $(".schedule > li > a").click(function() {
    $(".schedule > li").removeClass("sch_on");
    $(this).parent("li").addClass("sch_on");
    return false;
  });


  //리뷰, 질답테이블
 $(".brd_title").click(function (){
   var conts = $(this).parent("tr").next(".table_contents");
   if ($(conts).css("display") == "none"){
   $(".table_contents").hide();
   $(conts).show();
   }
   else if ($(conts).css("display") == "table-row"){
     $(conts).hide();
     };
   });

  //좌석선택 기능
  function stw() {
  /*  $(".seats > li").each(function() {
      var stw = $(this).width();
      $(this).css("height", stw);
    });*/


      var stw = $(".seats > li").width();
      $(".seats > li").css("height", stw);

  };
  stw();
  $(window).resize(function() {
    stw();
  });
  /*$(".seats li input").click(function() {
    var seat_numb = $(this).attr("id");
    $(".seat_numb span").text(seat_numb);
  });*/

  //교재 팝업
  $(".books_list li a").click(function (){
    $($(this).attr("href")).fadeIn(500);
    return false;
  });

  function close_book() {
    $(".the_books").fadeOut(500);
  };

  $(".close_book").click(function (){
    close_book();
  });

  $(".the_books .black_bg").click(function (){
    close_book();
  });

});
