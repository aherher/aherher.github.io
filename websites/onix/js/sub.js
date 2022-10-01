// //서브 네비
// $(".left_links").click(function () {
//   if ($(".li_left").css("display") == "none") {
//     $(".li_left").slideDown(300);
//     $(this).addClass("links_on");
//   } else {
//     $(".li_left").slideUp(300);
//     $(this).removeClass("links_on");
//   };
// });

// $(".right_links").click(function () {
//   if ($(".li_right").css("display") == "none") {
//     $(".li_right").slideDown(300);
//     $(this).addClass("links_on");
//   } else {
//     $(".li_right").slideUp(300);
//     $(this).removeClass("links_on");
//   };
// });

// 마이페이지
$(".answer_btn").click(function () {
  var the_answer = $(this).parent("tr").next(".answer");
  if ($(the_answer).css("display") == "none") {
    $(this).parent("tr").next(".answer").show();
  } else {
    $(this).parent("tr").next(".answer").removeAttr("style");
  };
});

$(".review_btn").click(function () {
  var the_reivew = $(this).parent("tr").next().next(".reivew_tr");
  if ($(the_reivew).css("display") == "none") {
    $(the_reivew).show();
  } else {
    $(the_reivew).removeAttr("style");
  };
});



//견적문의 라디오
$('.tracks_wrap input[type="radio"]').click(function () {
  var test = $(this).attr("id");
  $(".inComments").removeAttr("style");
  if (test == 'track01') {
    $("#tc01").show();
  } else if (test == 'track02') {
    $("#tc02").show();
  } else if (test == 'track03') {
    $("#tc03").show();
  };
});

//멤버
function current_txt() {
  var current_page = $(".currrent a").text();
  $(".current_page span").text(current_page);
  if (current_page == "") {
    $(".current_page span").text("전체");
  };
};

current_txt();


$(".current_page").click(function () {
  if ($(".sub_tabs").css("display") == "none") {
    $(".sub_tabs").slideDown(500);
    $(".current_page span").addClass("closen");
  } else {
    $(".sub_tabs").slideUp(500, function () {
      $(".sub_tabs").removeAttr("style");
      $(".current_page span").removeClass("closen");
    });
  };
});

//회원가입
$(".formElement select").change(function () {
  var sel_txt = $(this).children("option:selected").text();
  var sel_box = $(this).parent(".formElement").find("span");
  $(sel_box).text(sel_txt);
});

//아이디/비번찾기
$(".fiding_tabs a").click(function () {
  $(".finding_wrap").hide();
  $($(this).attr("href")).show();
  return false;
});