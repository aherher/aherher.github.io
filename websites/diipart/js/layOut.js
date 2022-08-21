$(document).ready(function(e) {
	var win_width = $(window).width();
	var win_height = $(window).height();
	/* var i = 0;
     setInterval(function (){
	if (i < 2){
     $(".bgs_wrap .main_bg").fadeOut(2200);
	 $(".bgs_wrap .main_bg").eq(i).next().fadeIn(2200);
	 i++;
	 } else if (i == 2){
		 $(".bgs_wrap .main_bg").fadeOut(2200);
	     $(".bgs_wrap .main_bg").eq(0).fadeIn(2200);
	      i = 0;
		 };
		 }, 9700);*/



	 //리사이징
	 $(window).resize(function (){
     $(".intro_Wrap").css("height", $(window).height());
	  $(".main_bg").css("height", "100%");
     $(".bgs_wrap").css("height", $(window).height());
		$(".vision ").css("width", $(window).width());
		$(".vision").css("height", $(window).height());
	//vision 리사이징
 	 /*if ($(window).width() > 400){
		 $(".vision").css("height", $(window).height());
		 } else if ($(window).width() < 400){
			 $(".vision").css("height", "auto");
			 };
	 //$(".vision02").css("margin-top", $(window).height());
	  if ($(window).width() > 740){
	   var vs_c01 = $(".vision_wrap01").height()/2;
	   $(".vision_wrap01").css("margin-top", -vs_c01);
	  }else if ($(window).width() < 740) {
		 $(".vision_wrap01").css("margin-top", 0);
		  };
	  if ($(window).width() > 1280){
			var vs_c02 = $(".vision_wrap02").height()/2;
	        $(".vision_wrap02").css("margin-top", -vs_c02);
		}else if ($(window).width() < 1280){
		    $(".vision_wrap02").css("margin-top", 0);
			};
		$(".vision").css("height", $(window).height());
		 var vs_c03 = $(".vision_wrap03").height()/2;
	     $(".vision_wrap03").css("margin-top", -vs_c03);*/

	 //프로젝트 상세페이지 리사이징
		var prj_vhieght = $(".resize").outerHeight();
		$(".prj_visual").css("height", prj_vhieght);


	//work 리사이징
	//var wor_title = $(".work_cops").height()/2;
	//$(".work_cops").css("margin-top", -wor_title);
	$(".vision ").css("width", $(window).width());

	//메인 리사이징

     /*var main_copy = $(".bg12").find(".main_cops").height()/2;
	 $(".bg12 .main_cops").css("margin-top", -main_copy);
	 var main_copy2 = $(".bg2").find(".main_cops").height()/2;
	 $(".bg2 .main_cops").css("margin-top", -main_copy2);
		/* if ($(window).width() < 421){
		 $(".footer_wrap").css("top", $(window).height());
		 } else if ($(window).width() > 420){
			$(".footer_wrap").css("top","auto");
			 };*/
		 });



/*var vis = $(".visual_slide > div").length();
$(".visual_slide").css("width", vis);*/

	// 메뉴
	$(".Mmenu_btn").click(function (){//메뉴 열기
        $(".fix_area").show();
		$(".Mmenu_Wrap").animate({marginRight:0}, 300);
		$(".Mmenu_btn").css("display","none");
		$(".Mmenu_close").css("display","block");

		$("body").css("height", $(window).height());
		$("body").css("overflow", "hidden");
		});

	$(".Mmenu_close").click(function Mmenu_close(){//메뉴닫기
		$(".Mmenu_Wrap").animate({marginRight:-600}, 300, function (){$(".fix_area").css("display","none");});
		$(".Mmenu_btn").css("display","block");
		$(".Mmenu_close").css("display","none");
		$(".Mabout_list").slideUp();

		$("body").removeAttr("style");
		});


	//work
	//var wor_title = $(".work_cops").height()/2;
	//$(".work_cops").css("margin-top", -wor_title);


/*	$(function() {

	var modern = window.requestAnimationFrame,
	target = $('.work_wrap .work_bg'), zenith, nadir, spot, pilot;

	storeDimensions();

	$(window).resize(storeDimensions).scroll(function() {

		spot = $(this).scrollTop();

		if (!pilot) {
		if (modern) requestAnimationFrame(checkFade);
		else checkFade();
		}
	});

function storeDimensions() {

	zenith = []; nadir = [];

	target.each(function() {

		var placement = $(this).offset().top;

		zenith.push(placement-$(window).height()*0.8);
		nadir.push(placement+$(this).outerHeight());
	});
}

function checkFade() {

	target.each(function(i) {

		if (!$(this).is(':animated')) {
		if (spot > zenith[i] && spot < nadir[i]) $(this).fadeTo(1500,1);
		}
	});
}
});*/


//top 버튼
$(".go_top").hide();
$(window).scroll(function (){
	var scrollTop = $(window).scrollTop();
	if (scrollTop > 150){
		$(".go_top").fadeIn(300);
		} else if (scrollTop < 150){
			$(".go_top").fadeOut(300);
			};
	});
$(".go_top").click(function (){
	$(window).scrollTop(0);
	return false;
	});

});
