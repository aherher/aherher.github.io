// 표 클릭 기능
$(".lineView").click(function () {
  var viewTd = $(this).next("tr").find(".viewTd");
  if ($(viewTd).css("display") == "none") {
    $(this).next("tr").find(".viewTd").slideDown(100);
  } else {
    $(this).next("tr").find(".viewTd").slideUp(100);
  }

});

$(".scroll").click(function () {
  var ntTop = $("#mainTabs").offset().top;
  $("body, html").animate({
    scrollTop: ntTop + 'px'
  }, 500);
});

$("#mainTabs > li").mouseenter(function () {
  var tabEq = $(this).index();
  $("#mainTabs").removeClass();
  $("#mainTabs").addClass("mTbg" + tabEq);
});

$("#mainTabs").mouseleave(function () {
  $("#mainTabs").removeClass();
});