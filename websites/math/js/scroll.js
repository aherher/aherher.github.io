 // 현재 완성
$(window).on('load', function() {
    $(".contents > .section").first().addClass("active");		
	var s = 1;    
	var act = 1;
	 $("html,body").stop().animate({scrollTop:0}, 1);
	  
	//스크롤 자동이동
	 $(".contents > .section").each(function () {
	  $(this).on("mousewheel DOMMouseScroll", function (e) {
	 if (e.originalEvent.wheelDelta >= 0) { // 스크롤 업	
	  var head_h =  $(".header_wrap").height();
	   if (s == 0) {
		     e.preventDefault();
		   } else if (s == 1){			  
			   s = 0;
			   $(".active").prev(".section").addClass("active");
	           $(".active").next(".section").removeClass("active");	 
	           var active = $(".contents > .active").offset().top -= head_h;		
	           $("html,body").stop().animate({scrollTop:active}, 500, function (){
				    s = 1;
				   });	
				 e.preventDefault();                      
			   };
    } else { // 스크롤 다운  
	    var head_h =  $(".header_wrap").height();
	  if (s == 0){
		    e.preventDefault();
		  } else if (s == 1){			
			  s = 0;
			  $(".active").next(".section").addClass("active");
	          $(".active").prev(".section").removeClass("active");
	          var active = $(".contents > .active").offset().top -= head_h;	
	          $("html,body").stop().animate({scrollTop:active}, 500, function (){
				  s = 1;
				  });
				 e.preventDefault();                   
			  };
	
    }
	 });
    });
	
	});	
 
 
