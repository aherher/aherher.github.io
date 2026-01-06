$(document).ready(function(e) {
	//메뉴
	$(".m_open").click(function (){// 메뉴 열기
	var $height = $(window).height();
	    $(".m_open").hide();
		$(".m_close").show();
		$(".menu_wrap").show();
		$(".menu_all").animate({top:0}, 300);
		});
		
	function m_close(){// 메뉴 닫기
	    $(".m_open").show();
		$(".m_close").hide();	
		$(".menu").css("height","auto");	
		$(".menu_all").animate({top:-100+"%"}, 300, function (){					
			$(".menu_wrap").hide();
			});
		};	
		
	$(".m_close").click(function (){
	   m_close()
		});	
		
	//클릭 시 이동기능
	function moving(mv){
		var offtop = $($(mv).attr("href")).offset().top -= 100;
		$('html, body').animate({scrollTop:offtop}, 300);
		};	
		
	$(".menu li a").click(function (){
		moving(this);
		return false;
		});
		
	$(".m_menu li a").click(function (){
		moving(this);
		m_close();
		return false;
		});	
	 
//메인 이미지 롤링
	$(".slide li").first().show();
	var i = 0;	
	var ims = $(".slide li").length -1; // 총 갯수
	var total = $(".slide li").length;
	var count = i + 1; 
	$(".img_nums .current").text("0" + count);
	$(".img_nums .alls").text("0" + total);
	var onplay = true;
	
	//기본 롤링 기능
	function rolling (){
		$(".slide li").fadeOut(1000);
		$(".slide li").eq(i).fadeIn(1000);	
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
	
	//비주얼 이미지 가운데로 정렬
	/*function visual_center (){
	  var v_img = $(".slide > li > img").width() / 2;
  	  $(".slide > li > img").css("margin-left", -v_img);
	};
 	 visual_center ();*/
	 
	$(window).resize(function (){
	 //visual_center ();
	});
	
	// - 커리어
	$("#career00").show();
	$(".info_lists li a").click(function (){
		$(".career_wrap").hide();
		$($(this).attr("href")).show();
		$(".info_lists li").removeClass("thison");
		$(this).parent("li").addClass("thison");		
		return false;			
		});
		
		
  //갤러리 이미지 슬라이드
  var thums = $(".thums");
  var thums_li = $(".thums > li");
  var thueq = $(thums_li).length;
  var thuwidth = $(thums_li).height() + 10;  
  var ap = 0;
  
  if (thueq <= 4) {
	  $(".thum_arr").hide();	  
	  } else if (thueq >= 5){
		  $(thums).css("height", thueq * thuwidth);  
          $(thums).css("margin-top", -thuwidth);
          $(thums_li).last().prependTo(thums);
		  };
  
  //윗클릭
  $(".ta_up").click(function (){
	 $(".thums:not(:animated)").animate({marginTop:parseInt($(thums).css("margin-top"))+thuwidth}, 300, function (){
		$(".thums > li").last().prependTo(thums);
		$(thums).css("margin-top", -thuwidth);			
		});
		ap++;		
	  });
	  
  //아래클릭  
  $(".ta_down").click(function (){
	 $(".thums:not(:animated)").animate({marginTop:parseInt($(thums).css("margin-top"))-thuwidth}, 300, function (){
		$(".thums > li").first().appendTo(thums);
		$(thums).css("margin-top", -thuwidth);	
		});
				
		if (ap > 0){
			ap -= 1;					
			} else if (ap == 0){
				ap = thueq -1;
				};
	  });
	  	
   //아티스트 이미지 슬라이드 클릭기능
   $(".thums li a").click(function (){
	   var img_src = $($(this).attr("href"));
	   var input_img = '<img src="' + $(this).attr("href") + '"alt=""/>';
	   $(".photo_on").find("img").remove();
	   $(input_img).appendTo(".photo_on");
	   return false;
	   });		
	   
   //인트로덕션 
	$(".intro_table > li").first().find(".intro_txt").show();
	$(".tab_arr").click(function (){
		$(".intro_table > li").find(".intro_txt").slideUp(300);
		$(this).parent("li").find(".intro_txt").slideDown(300);
		$(".tab_arr").removeClass("opened");
		$(this).addClass("opened");
		}); 
	  
	
	/*//영상 슬라이드 세팅	
  var video = $(".media_list");
  var video_li = $(".media_list > li");
  var vodeq = $(video_li).length;
  var vodwidth = $(video_li).width();
  var ttl = vodwidth + 28;
  $(video).css("width", vodeq * ttl);
  $(video).css("margin-left", -ttl);
  $(video_li).last().prependTo(video);
  var s = 0;
  
  $(window).resize(function (){
	 var vodwidth = $(video_li).width();
     var ttl = vodwidth + 28;
     $(video).css("width", vodeq * ttl);
     $(video).css("margin-left", -ttl);  
	 
	  //우클릭
     $(".vod_right").click(function (){
	 $(".media_list:not(:animated)").animate({marginLeft:parseInt($(video).css("margin-left"))-ttl}, 300, function (){
		$(".media_list > li").first().appendTo(video);
		$(video).css("margin-left", -ttl);			
		});		
	  });
	  
	   //좌클릭  
      $(".vod_left").click(function (){
	  $(".media_list:not(:animated)").animate({marginLeft:parseInt($(video).css("margin-left"))+ttl}, 300, function (){
		$(".media_list > li").last().prependTo(video);
		$(video).css("margin-left", -ttl);	
		});		
	  });
	   
	  });
  
  //우클릭
  $(".vod_right").click(function (){
	 $(".media_list:not(:animated)").animate({marginLeft:parseInt($(video).css("margin-left"))-ttl}, 300, function (){
		$(".media_list > li").first().appendTo(video);
		$(video).css("margin-left", -ttl);			
		});		
	  });
	  
  //좌클릭  
  $(".vod_left").click(function (){
	 $(".media_list:not(:animated)").animate({marginLeft:parseInt($(video).css("margin-left"))+ttl}, 300, function (){
		$(".media_list > li").last().prependTo(video);
		$(video).css("margin-left", -ttl);	
		});		
	  });*/
	
    /*  if ($(window).width() < 1070){
		
	     var vod_box = $(".vod_box").width() + "px";
	     $(".media_list li").attr('style', 'width:' + vod_box + '!important')
	   // $(".vod_wrap").find(".slick-slide").remove();
		 
	  }; 	  
  $(window).resize(function (){
	  if ($(window).width() < 1070){
	    var vod_box = $(".vod_box").width() + "px";
	     $(".media_list li").attr('style', 'width:' + vod_box + '!important')
	  } else {
		  $(".slick-slide > div").css("width", "auto");
		  };
	  });
	  */
  
	
	//프로필 영상보기 기능
   $("#video li a").click(function (){
	  
	 var movurl = $(this).attr("href"); 
	 var iframe = '<iframe width="100%" height="100%" src="' + movurl + '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

	 $(".vod_pop").fadeIn(300); 
	 $(".vod_area").fadeIn(300); 
     $(iframe).appendTo(".vod_area");

	 $("body, html").css("overflow","hidden");
	 return false;
	  }); 
   $(".close-vod").click(function (){
	  $(".vod_pop").fadeOut(300); 
	  $(".vod_area").fadeOut(300); 
	  $(".vod_area").find("iframe").remove();
	  $("body, html").css("overflow","auto");
	   });
   
	
	
});