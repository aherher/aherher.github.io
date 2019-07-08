$(document).ready(function(e) {
   //메인 이미지 롤링
	$(".slide li").first().show();
	var i = 0;	
	var ims = $(".slide li").length -1; // 총 갯수
	
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
		
	//우클릭
	$(".rightarr").click(function (){
		if(i < ims){
		i++;
		rolling ();
		} else if (i >= ims){
		i = 0;
		rolling ();
			};
		});
		
	//좌클릭
	$(".leftarr").click(function (){
		if(i == 0){
		i = ims;
		rolling ();
		} else if (i <= ims){
		i -= 1;
		rolling ();
			};
		});
	
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
	
	//top
	$(".top_wrap .go_top").click(function (){
		$(window).scrollTop(0);
		});
 
});