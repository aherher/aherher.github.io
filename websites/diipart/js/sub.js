//vision
$(".vision ").css("width", $(window).width());
$(".vision").css("height", $(window).height());
/* var vs_c03 = $(".vision_wrap03").height()/2;
 //$(".vision_wrap03").css("margin-top", -vs_c03);
if (win_width > 740){
var vs_c01 = $(".vision_wrap01").height()/2;
//$(".vision_wrap01").css("margin-top", -vs_c01);
};
if (win_width > 1280){
  var vs_c02 = $(".vision_wrap02").height()/2;
  //$(".vision_wrap02").css("margin-top", -vs_c02);
};*/


// $(".vision02").css("margin-top", $(window).height());

//about us
$(function() {
  $('.visual_slide').bxSlider({
    mode: 'horizontal',
    speed: 2600,
    pause: 9000,
    auto: true
  });
});


//프로필 팝업기능
$(".cru_name > a").click(function() {
  $("body").css("height", 1).css("overflow", "hidden");
  var pop_wrap = $(this).parentsUntil(".team_list").find(".pro_pop");
  $(pop_wrap).fadeIn(300);
  var pop_in = $(pop_wrap).find(".pop_area");
  var pop_height = $(pop_in).outerHeight();
  if ($(window).width() > 500) {
    $(pop_in).css("margin-top", -pop_height / 2);
  } else if ($(window).width() < 500) {
    $(".pro_area").css("margin-top", 0);
    $(".pro_area").css("top", 0)
  };
  return false;
});

function close_pop() {
  $(".pop_wrap").fadeOut(300);
  $("body").css("height", "auto");
  $("body").css("overflow", "auto");
};

$(".close").click(function() {
  close_pop();
});

//프로젝트 상세보기
$(".prj_visual > li").eq(0).show().css("opacity", 1);
var prjimgs = $(".prj_visual").children("li").length;
var p = 0;
var dots = $(".prj_dots li");
setInterval(function() {
  if (p < prjimgs - 1) {
    $(".prj_visual > li").fadeOut(2000);
    $(".prj_visual > li").eq(p).next().fadeIn(2000);
    p++;
    $(dots).removeClass("prj_on");
    $(dots).eq(p).addClass("prj_on");
  } else if (p == prjimgs - 1) {
    $(".prj_visual > li").fadeOut(2000);
    $(".prj_visual > li").eq(0).fadeIn(2000);
    p = 0;
    $(dots).removeClass("prj_on");
    $(dots).eq(0).addClass("prj_on");
  };
}, 6000);


var prj_width = $(".prj_dots").width() / 2;
$(".prj_dots").css("margin-left", -prj_width);
//var prj_vhieght = $(".prj_visual > li > img").outerHeight();
//$(".prj_visual").css("height", prj_vhieght);


$(dots).click(function() {
  $(dots).removeClass("prj_on");
  $(this).addClass("prj_on");
  p = $(this).index();
  $(".prj_visual > li").fadeOut(1000);
  $(".prj_visual > li").eq(p).fadeIn(1000);
});

$('.back_btn').click(function() {
  parent.history.back();
  return false;
});

//location
$(".view_map > a").click(function() {
  var pop_wrap = $($(this).attr("href"));
  $(pop_wrap).fadeIn(300);

  var pop_in = $(pop_wrap).find(".map_area");
  var pop_height = $(pop_in).outerHeight();
  $("body").css("overflow", "hidden");

  $(pop_in).css("margin-top", -pop_height / 2);

  return false;
});

//news
$(".news_wrap > li > a").hover(
  function() {
    var view = '<div class="view_layer"><p>View</p></div>';
    $(view).prependTo($(this).children(".new_img")).fadeIn(200);
  },
  function() {
    $(".view_layer").fadeOut(200, function() {
      $(this).remove();
    });
  });


//work
$(".sub_sel").change(function() {
  var the_val = $(this).find("option:selected").text();
  $(this).parent(".select_wrap").find("span").text(the_val);
});
