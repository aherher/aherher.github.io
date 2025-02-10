$(document).ready(function(e) {
	var win_width = $(window).width();
	//인트로
	var win_height = $(window).height();
    $(".intro_Wrap").css("height", win_height);
	$(".intro_logo").fadeIn(3000);
	
	//마우스 오버
	$(".web_menu > li").hover(function (){
		$(this).find(".gsub").show();
		}, function (){
			$(this).find(".gsub").hide();
			});
			
	//모바일 네비 클릭 기능
	$(".Mmenu > .subint > a").click(function (){
		if ($(this).parent("li").find(".mgsub").css("display") == "none"){
			$(this).parent("li").find(".mgsub").slideDown(300);
			} else {
				$(this).parent("li").find(".mgsub").slideUp(300);				
				};
				return false;
		 });
		 
		 
    
	// 모바일 메뉴
	$(".Mmenu_btn").click(function (){//메뉴 열기
        $(".fix_area").show();
		$(".Mmenu_Wrap").animate({marginRight:0}, 300);
		$(".Mmenu_btn").css("display","none");
		$(".Mmenu_close").css("display","block");	
		
		$("body").css("height", $(window).height());
		$("body").css("overflow", "hidden");
		});		
		
	function the_close(){
		$(".Mmenu_Wrap").animate({marginRight:-600}, 300, function (){$(".fix_area").hide();});		
		$(".Mmenu_btn").css("display","block");
		$(".Mmenu_close").css("display","none");

		$("body").css("height", "auto");
		$("body").css("overflow", "auto");		
		};	
		
	$(".Mmenu_close").click(function (){
		 the_close();
		});
		 
	
	//클릭링크
	$(".gsub > li > a").click(function (){	
	    var test = $(this).attr("href");
		var href = $(test).offset().top;
		alert(href);
		
		});
	
	//메인
	 $(".main_bg").css("height", win_height);
	 $(".bgs_wrap").css("height", win_height);
     var main_copy = $(".bg12").find(".main_cops").height()/2; 
	
	 $(".bgs_wrap .main_bg").hide();	
     $(".bgs_wrap .main_bg").eq(0).show();	
	 
	 if ($(window).height() < 815){
		 $(".bg12 .main_cops").css("top", 200+"px"); 
		 $(".bg12 .main_cops").css("margin-top", "auto"); 		 
		 } else if ($(window).height() > 815){
			  $(".bg12 .main_cops").css("top", 50+"%");
			  $(".bg12 .main_cops").css("margin-top", -main_copy); 	
			 };
	 	
	//메인 이미지 롤링
	var i = 0;	
	var ims = $(".bgs_wrap > .main_bg").length -1; // 총 갯수	
	//기본 롤링 기능
	function rolling (){
		$(".bgs_wrap > .main_bg").fadeOut(1000);
		$(".bgs_wrap > .main_bg").removeClass("active");
		$(".bgs_wrap > .main_bg").eq(i).fadeIn(1000);	
		$(".bgs_wrap > .main_bg").eq(i).addClass("active");
		$(".dot_wrap li").removeClass("dot_on");
		$(".dot_wrap li").eq(i).addClass("dot_on");
		};
		
	//이미지 총 갯수 별 도트. 순서.	
	function fade() {
		if (i < ims){i++;}
		else if (i >= ims){i = 0;};
		rolling ();
		};			
	
	//순서 도트 클릭 시
	$(".dot_wrap li").click(function (){
		var d = $(this).index(".dot_wrap li");
		i = d;			
		rolling ();		
		});	
	
	//중요. 처음 페이지 로딩 후 셋 인터벌 작동. 인터벌 보다 적게. 즉, 페이드 되는 멈춰있는 시간 - 바뀌는 시간(1초)	
	var thefades = setTimeout(function (){
		fade();
		thefades2 = setInterval (fade,6000);
		}, 5000);
		
	//도트에 마우스 오버 시 자동 멈춤 기능	
	$(".thestop").hover(
	function (){
		clearTimeout(thefades);
		clearInterval(thefades2);
		},
	function (){
		thefades = setTimeout(function (){
		fade();
		thefades2 = setInterval (fade,6000);
		}, 5000);	
	});	
	
	//어바웃 페이지 자세히보기
	$(".eses li a").click(function (){
		$(".about_pop").fadeIn(300);
		$(".about_pop > div").hide();	
		$($(this).attr("href")).fadeIn(300);		
		if($(window).width() < 600){			
			$("body, html").css("overflow","hidden");
			};		
		return false;
		});
	
	$(".about_pop .close_btn").click(function (){
		$(".about_pop").fadeOut(300);
		$(".about_pop > div").fadeOut(300);			
		if($(window).width() < 600){
			$("body, html").css("overflow","auto");
			};			
		});
	 
	 $(window).resize(function (){
		 if($(window).width() > 600 && $(".about_pop").css("display") == "block") {
			 $("body, html").css("overflow","auto");
			 } else if ($(window).width() < 600 && $(".about_pop").css("display") == "block"){
				  $("body, html").css("overflow","hidden");
				 }
	     });
	 
	 
	 //vision	
	 /*
   	 $(".vision ").css("width", $(window).width());	
	  $(".vision").css("height", $(window).height());		
	  var vs_c03 = $(".vision_wrap03").height()/2;
	  $(".vision_wrap03").css("margin-top", -vs_c03);		 
	 if (win_width > 740){
	 var vs_c01 = $(".vision_wrap01").height()/2;
	 $(".vision_wrap01").css("margin-top", -vs_c01);	
	 };
	 if (win_width > 1280){
	   var vs_c02 = $(".vision_wrap02").height()/2;
	   $(".vision_wrap02").css("margin-top", -vs_c02);  
	  };
	   */
	 
	 //리사이징
	 $(window).resize(function (){
     $(".intro_Wrap").css("height", $(window).height());
     $(".bgs_wrap").css("height", $(window).height());
	  
	  
	  if ($(".fix_area").css("display") == "block" && $(window).width() > 600){
		    the_close();
		  };
	
	  
	  
	//vision 리사이징
	/*
 	 if ($(window).width() > 400){
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
	     $(".vision_wrap03").css("margin-top", -vs_c03);	
	  
	 //프로젝트 상세페이지 리사이징
		var prj_vhieght = $(".resize").outerHeight();
		$(".prj_visual").css("height", prj_vhieght); 
*/
	$(".vision ").css("width", $(window).width());	
	
	//메인 리사이징
	 $(".main_bg").css("height", $(window).height());
	 $(".bgs_wrap").css("height", $(window).height());   
	 var main_copy = $(".active").find(".main_cops").height()/2; 
	 if ($(window).height() < 815){
		 $(".bg12 .main_cops").css("top", 200+"px"); 
		 $(".bg12 .main_cops").css("margin-top", "auto"); 		 	 
		 } else if($(window).height() > 815) {
			  $(".bg12 .main_cops").css("top", 50+"%"); 	 
			  $(".bg12 .main_cops").css("margin-top", -main_copy); 	
			 };
		 });

//about us
$('.visual_slide').slick({
  dots: true,
  infinite: true,
  speed:1500,
  autoplay: true,
  autoplaySpeed:2600
});
//main

/*
$('.bgs_wrap').slick({
  dots: true,
  infinite: true,
  speed:1500,
  fade: true,
  autoplay: false,
  autoplaySpeed:6000,
  cssEase: 'linear'
});
*/

	
//프로필 팝업기능
/*
$(".cru_name > a").click(function (){
		$("body").css("height", 1).css("overflow", "hidden");    		
		var pop_wrap = $(this).parentsUntil(".team_list").find(".pro_pop");	
		$(pop_wrap).fadeIn(300);
		var pop_in = $(pop_wrap).find(".pop_area");
		var pop_height = $(pop_in).outerHeight();								
		if ($(window).width() > 500){		
		$(pop_in).css("margin-top", -pop_height/2);
		} else if ($(window).width() < 500){
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
		
 $(".close").click(function (){
		close_pop();		
		});
	*/
	
//포트폴리오 이미지 롤링
	$(".slide li").first().show();
	var po = 0;	
	var imsp = $(".slide li").length -1; // 총 갯수
	var total = $(".slide li").length;
	var count = po + 1; 
	$(".img_nums .current").text("0" + count);
	$(".img_nums .alls").text("0" + total);
	var onplay = true;
	
	//기본 롤링 기능
	function rolling_port (){
		$(".slide li").fadeOut(1000);
		$(".slide li").eq(po).fadeIn(1000);	
		var count = po + 1; 		
		$(".img_nums .current").text("0" + count);
		};
		
	//이미지 총 갯수 별 도트. 순서.	
	function fade_port() {
	  if(onplay == true){
		 if (po < imsp){po++;}
		 else if (po >= imsp){po = 0;};
		 rolling_port ();
	  } else if (onplay == false){
		  return false;
		  };
		};	
		
	//우클릭
	function click_right (){
		if(po < imsp){
		po++;
		rolling_port ();
		} else if (po >= imsp){
		po = 0;
		rolling_port ();
			};		
		};	
	$(".next").on("click",function (){
		click_right();
		});
		
	//좌클릭
	function click_left (){
		if(po == 0){
		po = imsp;
		rolling_port ();
		} else if (po <= imsp){
		po -= 1;
		rolling_port ();
			};
		};	
	$(".prev").on("click",function (){
		click_left ();
		});	
		
	//정지, 재생버튼
	$(".control .the_stop").click(function (){
		onplay = false;
		$(this).hide();
		$(this).removeClass("cotr_on");
		$(".next").off();
		$(".prev").off();
		$(".control .the_play").css("display", "block");
		$(".play_on").removeClass("play_on");
		$(".next").removeClass("play_on");
		$(".prev").removeClass("play_on");			
		});
		
	$(".control .the_play").click(function (){
		onplay = true;
		$(this).hide();
		$(this).addClass("cotr_on");
		$(".next").on("click",function (){
		click_right();
		});
		$(".prev").on("click",function (){
		click_left ();
		});	
		$(".control .the_stop").css("display", "block");
		$(".slide_btns .control").addClass("play_on");
		$(".next").addClass("play_on");
		$(".prev").addClass("play_on");			
		});
	
	
	//중요. 처음 페이지 로딩 후 셋 인터벌 작동. 인터벌 보다 적게. 즉, 페이드 되는 멈춰있는 시간 - 바뀌는 시간(1초)	
	var thefades = setTimeout(function (){
		fade_port();
		thefades2 = setInterval (fade_port,6000);
		}, 5000);
		
	//도트에 마우스 오버 시 자동 멈춤 기능	
	$(".play_on").hover(
	function (){
		clearTimeout(thefades);
		clearInterval(thefades2);
		},
	function (){
		thefades = setTimeout(function (){
		fade_port();
		thefades2 = setInterval (fade_port,6000);
		}, 5000);	
	});			
	

//프로젝트 상세보기
/*
$(".prj_visual > li").eq(0).show().css("opacity", 1);
var prjimgs = $(".prj_visual").children("li").length;
var p = 0;
var dots = $(".prj_dots li");
setInterval(function (){
	if (p < prjimgs-1){	 
     $(".prj_visual > li").fadeOut(2000);
	 $(".prj_visual > li").eq(p).next().fadeIn(2000);	
	 p++;	 
	 $(dots).removeClass("prj_on");
	 $(dots).eq(p).addClass("prj_on");	
	 } else if (p == prjimgs-1){
		 $(".prj_visual > li").fadeOut(2000);
	     $(".prj_visual > li").eq(0).fadeIn(2000);
	      p = 0; 
		 $(dots).removeClass("prj_on");
	     $(dots).eq(0).addClass("prj_on");	 		  
		 };
		 }, 6000);


var prj_width = $(".prj_dots").width()/2;
$(".prj_dots").css("margin-left", -prj_width); 

$(dots).click(function (){
	$(dots).removeClass("prj_on");
	$(this).addClass("prj_on");
	p = $(this).index();
	 $(".prj_visual > li").fadeOut(1000);
	 $(".prj_visual > li").eq(p).fadeIn(1000);
	}); 
 
 $('.back_btn').click(function(){
		parent.history.back();
		return false;
	});

	//location
$(".view_map > a").click(function (){
		var pop_wrap = $($(this).attr("href"));
		$(pop_wrap).fadeIn(300);

		var pop_in = $(pop_wrap).find(".map_area");
		var pop_height = $(pop_in).outerHeight();	
		$("body").css("overflow", "hidden"); 					
				
		$(pop_in).css("margin-top", -pop_height/2);

		return false;
});
	*/	
  //news
	$(".news_wrap > li > a").hover(
	 function (){		
		var view = '<div class="view_layer"><p>View</p></div>';
		$(view).prependTo($(this).children(".new_img")).fadeIn(200);		
		},
	 function (){	
			$(".view_layer").fadeOut(200, function (){
				$(this).remove();
				});		
		});
		
	 $(".cate_sel").change(function (){
		var the_val = $(this).find("option:selected").text();
	    $(this).parent(".category_wrap").find("span").text(the_val);
		 });	
		
		
	//work	
	/*
$(".sub_sel").change(function (){
	var the_val = $(this).find("option:selected").text();
	$(this).parent(".select_wrap").find("span").text(the_val);
	});	
	*/
//top 버튼
/*
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
	});*/

});