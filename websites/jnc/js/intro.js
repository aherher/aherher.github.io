function changeView() {
  window.location.href = "main.html";
};
setTimeout(function () {
  changeView();
}, 3500);

//¿Œ∆Æ∑Œ
var win_height = $(window).height();
$(".intro_Wrap").css("height", win_height);
$(".intro_logo").fadeIn(3000);

/*$(window).resize(function() {
  if ($(window).width() < 420) {
    var logowidth = $(".intro_logo").width() / 2;
    $(".intro_logo").css("margin-left", -logowidth);
  };
});
if ($(window).width() < 420) {
  var logowidth = $(".intro_logo").width() / 2;
  $(".intro_logo").css("margin-left", -logowidth);
};*/
