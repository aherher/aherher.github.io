function current_txt() {
  var current_page = $(".currrent a").text();
  $(".current_page span").text(current_page);
  if(current_page == "") {
    $(".current_page span").text("전체");
  };
};

current_txt();


$(".current_page").click(function() {
  if ($(".sub_tabs").css("display") == "none") {
    $(".sub_tabs").slideDown(500);
    $(".current_page span").addClass("closen");
  } else {
    $(".sub_tabs").slideUp(500, function() {
      $(".sub_tabs").removeAttr("style");
      $(".current_page span").removeClass("closen");
    });
  };
});

//포트폴리오페이지
var inLayer = '<div class="layer"></div>';
$(inLayer).appendTo(".portfolio_list li a");

$(window).load(function() {

  function the_last() {
    var lastest = $(".portfolio_list").find(".pb11");
    var last_height = $(lastest).outerHeight() + 21;
    $(lastest).css({
      "margin-top": -last_height + "px"
    });
  };
  the_last();
  $(window).resize(function() {
    the_last();
  });

});
