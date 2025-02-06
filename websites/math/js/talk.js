$(".alert_btn").click(function() {
  $(".talk_wrap").show().animate({
    right: 0
  }, 500);
});

$(".close_alert").click(function() {
  $(".talk_wrap").animate({right: -280 + "px"}, 500, function(){
    $(".talk_wrap").removeAttr("style");
  });
});
