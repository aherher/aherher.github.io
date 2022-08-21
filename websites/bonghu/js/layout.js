$(document).ready(function(e) {
   //메뉴 슬라이드 기능	
    $(".header_wrap").mouseenter(function (){		
		$(".sub_menuBG:not(:animated)").slideDown(200);
		$(".sub_menu:not(:animated)").slideDown(200);
		$(".menus > li").animate({height:250}, 0);
		});
	$(".header_wrap").mouseleave(function (){		
		$(".sub_menuBG").slideUp(200);
		$(".sub_menu").slideUp(200);
		$(".menus > li").animate({height:19}, 0);
		});	
	$(".main_wrap").mouseenter(function (){
		$(".sub_menuBG").slideUp(200);
		$(".sub_menu").slideUp(200);
		$(".menus > li").animate({height:19}, 200);
		});
	$(".contents").mouseenter(function (){
		$(".sub_menuBG").slideUp(200);
		$(".sub_menu").slideUp(200);
		$(".menus > li").animate({height:19}, 200);
		});
		
	//메인 비쥬얼 기능
	var img_width = $(".main_imgs > li").width();
	var visual = $(".main_imgs > li").length * img_width;
	//var win_width = $(window).width();
	//$(".main_imgs").css("width", visual);
//	$(".main_imgs > li").last().prependTo(".main_imgs");
	//$(".main_imgs > li").css("max-width", win_width);
	var i = 0;
	var dots = $(".dots li").length -1;
	$(".main_imgs > li").eq(i).show();
	$(".main_imgs > li").eq(i).css("opacity",1);
/*	
	$(".theRight").click(function (){
	$(".main_imgs:not(:animated)").animate({marginLeft:parseInt($(".main_imgs").css("margin-left"))-img_width}, 300, function (){
		$(".main_imgs > li").first().appendTo(".main_imgs");
		$(".main_imgs").css("margin-left", -img_width+"px");	
		if (i < dots){			
			i++;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(i)	.addClass("dot_on");	
		}else if (i == dots){
			i = 0;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(0)	.addClass("dot_on");	
			};		
		});		
		});
		
	$(".theLeft").click(function (){
		$(".main_imgs:not(:animated)").animate({marginLeft:parseInt($(".main_imgs").css("margin-left"))+img_width}, 300, function (){
		$(".main_imgs > li").last().prependTo(".main_imgs");
		$(".main_imgs").css("margin-left", -img_width+"px");	
		if (i > 0){			
			i-=1;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(i)	.addClass("dot_on");	
		}else if (i == 0){
			i = 2;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(2)	.addClass("dot_on");	
			};		
		});
		});
		*/
		function onFade(){
		if (i < dots){		
		  	$(".dots li").eq(i)	.removeClass("dot_on");
	     	$(".dots li").eq(i)	.next("li").addClass("dot_on");	
			$(".main_imgs li").eq(i).fadeOut(1500);
	        $(".main_imgs li").eq(i).next("li").fadeIn(1500);
			i++;				
		}else if (i == dots){
			$(".main_imgs > li").eq(i).fadeOut(1500);
	        $(".main_imgs > li").eq(0).fadeIn(1500);
			i = 0;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(0)	.addClass("dot_on");			
			};			
		};
		
		
		$(".theRight").click(function (){
			onFade();
			});
	    $(".theLeft").click(function (){
		if (i > 0){		
		  	$(".dots li").eq(i)	.removeClass("dot_on");
	     	$(".dots li").eq(i)	.prev("li").addClass("dot_on");	
			$(".main_imgs li").eq(i).fadeOut(1500);
	        $(".main_imgs li").eq(i).prev("li").fadeIn(1500);
			i-=1;				
		}else if (i == 0){
			$(".main_imgs > li").eq(i).fadeOut(1500);
	        $(".main_imgs > li").eq(2).fadeIn(1500);
			i = 2;
		  	$(".dots li").removeClass("dot_on");
	     	$(".dots li").eq(2)	.addClass("dot_on");			
			};			
		});
		
		setInterval (function (){
		  onFade();
		}, 6000);
		
	$(".dots li").click(function (){
		var click_dots = $(this).index();		
		i = click_dots;
		$(".dots li").removeClass("dot_on");
		$(".dots li").eq(click_dots).addClass("dot_on");
		
		
		/*//$(".main_imgs > li").animate({opacity:0}, 900, function (){
			//	$(this).hide();
				//});
	    $(".main_imgs > li").eq(click_dots).show().animate({opacity:1},900);*/
		
		 $(".main_imgs > li").fadeOut(1500);
		 $(".main_imgs > li").eq(click_dots).fadeIn(1500);
				
		});	
		
		
	//메뉴소개 클릭시 팝업기능	
	$(".menu_wrap > li > a").click(function (){
		/*var inpop = $(this).attr("href");
		$(".blck_bg").fadeIn(200);
		$(inpop).css("overflow", "inherit");
		$(inpop).show().animate({height:696}, 200);*/
		return false;	
		});	
	/*$(".close_pop").click(function (){			
		$(".menu_pop").fadeOut(200, function (){
			$(".menu_pop").css("overflow", "hidden");
		    $(".menu_pop").hide().animate({height:0}, 0);
			});
		$(".blck_bg").fadeOut(200);
		
		});*/
	
});