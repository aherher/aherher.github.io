$(document).ready(function(e) {
   $(".menu > li").mouseenter(function (){
	   $(".sub_menu").hide();
	   $(this).find(".sub_menu").show();
       $(".subm_bg").show();
	   });
   $(".header_wrap").mouseleave(function (){
	   $(".sub_menu").hide();	  
       $(".subm_bg").hide();
	   });	
	   
	//모바일 메뉴 기능
  $(".menu_btn").click(function (){
	if($(".menu_mwrap").css("display") == "none"){  
	  $(".menu_mwrap").show();
	  $(".menu_marea").animate({top:0}, 300);	
	  $(".blck_bg").fadeIn(300);
	  $("body, html").css("overflow","hidden");
	  $(this).addClass("close_btn");
	} else {
		$(".menu_marea").animate({top:-100+"%"}, function (){
		$(".menu_mwrap").hide();
		$(".sub_menus").hide(0);
		$(".menu_m > li > a").removeClass("opend");
		  });	
	    $(".blck_bg").fadeOut(300);
	    $("body, html").css("overflow","inherit");
		$(this).removeClass("close_btn");
		};
	});  
	
	//서브메뉴 열림
  $(".menu_m > li > a").click(function (){	
    var sub_menu = $(this).parent("li").find(".sub_menus"); 
	
	 if($(sub_menu).css("display") == "none") {
	   $(".sub_menus").slideUp(300);
	   $(sub_menu).slideDown(300);
	   $(".menu_m > li > a").removeClass("opend"); 
	   $(this).addClass("opend");	  
	 } else {
	   $(".sub_menus").slideUp(300);
	   $(".menu_m > li > a").removeClass("opend"); 
		 };		 	
	return false;  		  
	});  
	
	$(window).resize(function (){
	  if($(window).width() >= 1080){
	    $(".menu_marea").animate({top:-100+"%"}, 1);
		$(".menu_mwrap").hide();
		$(".blck_bg").fadeOut(300);
	    $("body, html").css("overflow","inherit");
		$(".menu_btn").removeClass("close_btn");  
		  };	
		});
		
	
	//상세페이지 탭 바로가기
	$(".sub_links > div").click(function (){	
		if ($(this).children(".in_links").css("display") == "none"){			
		$(this).children(".in_links").show();			
		} else if ($(this).children(".in_links").css("display") == "block"){
			$(this).children(".in_links").hide();		
			};
		}); 	
		$(".left_links").click(function (){
			$(".right_links").find(".in_links").hide();
			});
		$(".right_links").click(function (){
			$(".left_links").find(".in_links").hide();
			});
			
		$(".left_links .in_links li a").click(function (){
			var subpage = $(this).text();
			var thesubs = $(this).attr("href");
			$(".right_links").find(".in_links").appendTo(".hided_lise");
			$(".left_links .cur_page > span").text(subpage);
			$(thesubs).appendTo(".right_links");
			var finding = $(thesubs).find("li").first().text();
			$(".right_links .cur_page > span").text(finding);
			});	
	 
	 
     //서브페이지 내용 탭
	 $("#resch01").show();
	 $("#chart01").show();
	 $(".sub_tab > li a").click(function (){
		 $(".sub_tab li").removeClass("st_on");
		 $(this).parent("li").addClass("st_on");
		 $(".researchs_wrap").hide();
		 $(".chart_box").hide();
         $($(this).attr("href")).show();
		 return false;
		 });
	   
	
});