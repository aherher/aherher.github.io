// 슬라이드
$('.peopleLists').slick({
  dots: false,
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: true,
  pauseOnHover: false,
  responsive: [
    {
      breakpoint: 700,
      settings: {
        slidesToShow: 1,
      }
    }
  ]
});



//이슈 투표 pc
var msle = $(".ports_slide");
var msle_li = $(".ports_slide > li");
var tmsq = $(msle_li).length;
// var mslewd = $(msle_li).width();
var mslewd = 600;
// var margin_Right = $(msle_li).last().outerWidth(true);
var margin_Right = 692;
$(msle).css({ //슬라이드 전체 크기
  "margin-left": -margin_Right + 'px',
  "width": tmsq * (mslewd + margin_Right)
});
$(msle_li).last().prependTo(msle);
var msa = 0;
var mv_total = $(".ports_slide > li").length;
var mv_count = msa + 1;
$(".ind_area .acount").text("0" + mv_count);
$(".ind_area .atotal").text("0" + mv_total);
$(".ps_wraps > li").eq(msa).show();
var s = 1; //슬라이드 실행 조건


function doSlide() {
  if (s == 0) { //슬라이드 움직이는 중에 이중으로 슬라이드 되지 못하게 함
    return false;
  } else if (s == 1) {
    s = 0; //슬라이드 움직이는 중에 이중으로 슬라이드 되지 못하게 함
    $(".ports_slide:not(:animated)").animate({
      marginLeft: parseInt($(msle).css("margin-left")) - margin_Right
    }, 300, function () {
      $(".ports_slide > li").first().appendTo(msle);
      $(msle).css("margin-left", -margin_Right);
      s = 1; //슬라이드 후 다음버튼 클릭 시 잠금 해제
      // $(".mv_next").addClass("non_next");
    });
    msa++;
    if (msa >= tmsq) {
      msa = 0;
    };
    console.log(msa);
    var mv_count = msa + 1;
    $(".ind_area .acount").text("0" + mv_count);

    $(".curr_img").next(".ports_slide li").addClass("curr_img");
    $(".curr_img").prev(".ports_slide li").removeClass("curr_img");
    $(".ps_wraps > li").fadeOut(300);
    $(".ps_wraps > li").eq(msa).fadeIn(300);
  };
};


//우클릭
$(".inbtns .mv_next").click(function () {
  doSlide();
});



var thefades = setTimeout(function () {
  doSlide();
  thefades2 = setInterval(doSlide, 4000);
}, 3000);


//좌클릭
$(".inbtns .mv_prev").click(function () {
  // margin_Right = $(msle_li).last().outerWidth(true);
  if (s == 0) {
    return false;
  } else if (s == 1) {
    s = 0;
    $(".ports_slide:not(:animated)").animate({
      marginLeft: parseInt($(msle).css("margin-left")) + margin_Right
    }, 300, function () {
      $(".ports_slide > li").last().prependTo(msle);
      $(".ports_slide").css("margin-left", -margin_Right);
      s = 1;
    });
    if (msa > 0) {
      msa -= 1;
    } else if (msa == 0) {
      msa = tmsq - 1;
    };

    var mv_count = msa + 1;
    $(".ind_area .acount").text("0" + mv_count);
    $(".curr_img").prev(".ports_slide li").addClass("curr_img");
    $(".curr_img").next(".ports_slide li").removeClass("curr_img");
    $(".ps_wraps > li").fadeOut(300);
    $(".ps_wraps > li").eq(msa).fadeIn(300);
  };
});



//이슈투표 모바일
var $status_current = $('.img_nums .current');
var $status_all = $('.img_nums .all');
var $slickElement = $('.mob_port');

$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
  //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
  var i = (currentSlide ? currentSlide : 0) + 1;
  // $status.text(i + '/' + slick.slideCount);
  $status_current.text(i);
  $status_all.text('/ ' + slick.slideCount);
});


var news_eq = $(".news_lists > li").length;
if (news_eq == 2) {
  var blanker = '<li></li>';
  $(blanker).appendTo(".news_lists");
};

$(".mob_port").slick({
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: 1200,
  arrows: true,
  pauseOnHover: false,
  asNavFor: '.mob_st',
});

$('.mob_st').slick({
  asNavFor: '.mob_port',
  dots: false,
  speed: 1200,
  arrows: false,
  centerMode: false,
  focusOnSelect: false
});


$(window).load(function () {
  $(".mob_port .slick-arrow").prependTo(".mobPort_bnts");
});
