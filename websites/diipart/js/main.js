var win_width = $(window).width();
var win_height = $(window).height();

//메인
 $(".main_bg").css("height", win_height);
 $(".bgs_wrap").css("height", win_height);
	 var main_copy = $(".bg12").find(".main_cops").height()/2;
 $(".bg12 .main_cops").css("margin-top", -main_copy);
 var main_copy2 = $(".bg2").find(".main_cops").height()/2;
 $(".bg2 .main_cops").css("margin-top", -main_copy2);
 $(".bgs_wrap .main_bg").hide();
	 $(".bgs_wrap .main_bg").eq(0).show();
 if ($(window).width() < 421){
	 $(".footer_wrap").css("top", $(window).height());
	 };

	 //main
 	$(function(){
 	  $('.bgs_wrap').bxSlider({
 	    mode: 'fade',
 		speed:1500,
 		pause:6000,
 		auto:true
 	  });
 	});
