
//서브 네비
$(".left_links").click(function () {
  if ($(".li_left").css("display") == "none") {
    $(".li_left").slideDown(300);
    $(this).addClass("links_on");
  } else {
    $(".li_left").slideUp(300);
    $(this).removeClass("links_on");
  };
});

$(".right_links").click(function () {
  if ($(".li_right").css("display") == "none") {
    $(".li_right").slideDown(300);
    $(this).addClass("links_on");
  } else {
    $(".li_right").slideUp(300);
    $(this).removeClass("links_on");
  };
});

// 서브 탭기능
$("#tabs01").show();
$(".true_tab li a").click(function () {
  $(".true_tab li").removeClass("on");
  $(this).parent("li").addClass("on");
  $(".hidden").hide();
  $($(this).attr("href")).show();
  return false;
});

function openPop(box) {
  $(".popWrap").fadeIn(500);
  $($(box).attr("href")).show();
}

function closePop() {
  $(".popWrap").fadeOut(500, function () {
    $(".popWrap").removeAttr("style");
    $(".pop_box").removeAttr("style");
  });
};

$(".closeBtn").click(function () {
  closePop();
});

$(".blk_bg").click(function () {
  closePop();
});

$(".recomend_menus li a").click(function () {
  openPop(this);
  return false;
});

$(".menus_lists li a").click(function () {
  openPop(this);
  return false;
});


// var porfolio = $(".port_list > li").length;
// console.log(porfolio);
// for (i = 0; i < porfolio; i++) {
//   var delay = "delay" + i;
//   $(".port_list > li").eq(i).addClass(delay);
// }