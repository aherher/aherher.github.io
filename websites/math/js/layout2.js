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


  //����� �޴� ���
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

  //����޴� ����
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

  //���콺 ������ �޴�
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


  //��ũ�� �� ���θ޴�
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

  //���� �����̵�
  function slide_h() {
    if ($(".slide li .mv_mob").css("display") == "none") {
      var win_h = $(window).height();
      $(".slide_wrap").css("height", win_h);
    } else {
      $(".slide_wrap").removeAttr("style");
    };
  };
  slide_h();
  $(window).resize(function() {
    slide_h();
  });


  //���������� �˾�
  $(".btns_wrap li a").click(function() {
    window.open(this.href, "", "width=720, height=800, scrollbars=yes, resizable=yes");
    return false;
  });

  //�Ұ�
  if ($(window).width() >= 800) {
    var win_h = $(window).height();
    $(".introduce").css("height", win_h);
  };


  //���� ����ȸ
  $("#ptable01").show();
  $(".plts > li > a").click(function() {
    $(".news_table").hide();
    $($(this).attr("href")).show();
    $(".plts > li").removeClass("pl_on");
    $(this).parent("li").addClass("pl_on");
    return false;
  });


  //���� �׺�
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

  //���������� �Ǳ��
  $("#view01").show();
  $(".true_tabs > li > a").click(function() {
    $(".page_tabs > li").removeClass("pt_on");
    $(this).parent("li").addClass("pt_on");
    $(".hidden_tab").hide();
    $($(this).attr("href")).show();
    return false;
  });

  //����Ұ�
  var over_layer = '<div class="layer"></div>';
  $(over_layer).prependTo(".teach_img");

  //�������˾�
  $(".teachers > li").each(function() {
    var movurl = $(this).find("a").attr("href");
    if (!movurl) {
      $(this).find(".vod_btn").hide();
    };
  });
  $(".teachers > li > a").click(function() {
    var movurl = $(this).attr("href");
    if (!movurl) {
      alert("���� �غ��� �Դϴ�.");
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

  //�˾��ݱ�
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


  //������� ���ι�
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

  //�ð�ǥ ���
  $(".schedule > li > a").click(function() {
    $(".schedule > li").removeClass("sch_on");
    $(this).parent("li").addClass("sch_on");
    return false;
  });

});
