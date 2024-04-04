// 투표현황 팝업
function theCount() {
  $('.counter').counterUp({
    time: 2000
  });
};


var movingBar;
function moving(A) {
  movingBar = A;
  $(movingBar).each(function () {
    var yesNumber = $(this).find(".dd_yes span").data("number");
    var noNumber = $(this).find(".dd_no span").data("number");
    $(this).find(".yngraph .yes_color").css("width", yesNumber + "%");
    $(this).find(".yngraph .no_color").css("width", noNumber + "%");
  });
};

$(".viewPop a").click(function () {
  $(".votePop_wrap").fadeIn(500, function () {
    // 투표결과 기능
    $(".prograve").each(function () {
      var votedNumer = $(this).prev(".edinTxt").find(".percent").text();
      $(this).find("span").css("width", votedNumer + "%");
    });

    // 찬반결과
    // $(".prograve").each(function () {
    //   var votedNumer = $(this).parentsUntil("li").parent("li").find(".edinTxt").find(".percent").text();
    //   $(this).find("span").css("width", votedNumer + "%");
    // });
    var tab01graph = $("#tab01").find(".agers");
    moving(".ynlLists .ynViews");
    moving(tab01graph);

    // 카운트
    $('.counter').counterUp({
      time: 2500
    });
  });
});

function closePop() {
  $(".votePop_wrap").fadeOut(500, function () {
    $(".prograve span").removeAttr("style");
    $(".yngraph > div").removeAttr("style");
    $(".hidden").hide();
    $("#tab01").show();
    $(".popsTab li").removeClass("tabOn");
    $(".popsTab li").eq(0).addClass("tabOn");
  });
};

$(".close_pop").click(function () {
  closePop();
});

$(".votePop_wrap .blk_bg").click(function () {
  closePop();
});

$("#tab01").show();
$(".popsTab li a").click(function () {
  var infenger = $($(this).attr("href")).find(".agers");
  // theCount();
  var countNumber = $(this).attr("href");
  $(".popsTab li").removeClass("tabOn");
  $(this).parent("li").addClass("tabOn");
  $(".hidden").hide();
  $($(this).attr("href")).show();
  $(".votedGraph").find(".yngraph div").removeAttr("style");


  $(countNumber).find('.counter').counterUp({
    time: 2500
  });


  setTimeout(function () {
    moving(infenger);
  }, 2);


  // if ($(this).attr("href") == "#tab03") {
  //   setTimeout(function () {
  //     moving("#tab03 .ynViews");
  //   }, 1);
  // };
  return false;
});



// 댓글수정기능
$(".edit a").click(function () {
  var edit = $(this).parentsUntil(".commentsLists").parent(".commentsLists").find("#doEdit");
  // var inValue = $(this).parentsUntil(".commentsLists").parent(".commentsLists").find(".writered").text();
  if ($(edit).css("display") == "none") {
    $(edit).css("display", "flex");
    // $(edit).find("input").val(inValue);
    $(this).parent().addClass("active");
  } else {
    $(edit).hide();
    $(this).parent().removeClass("active");
  };
  return false;
});

// 대댓글
$(".doWrite a").click(function () {
  var edit = $(this).parentsUntil(".commentsLists").parent(".commentsLists").find("#doInwriting");
  // var inValue = $(this).parentsUntil(".commentsLists").parent(".commentsLists").find(".writered").text();
  if ($(edit).css("display") == "none") {
    $(edit).css("display", "flex");
    // $(edit).find("input").val(inValue);
    $(this).parent().addClass("active");
  } else {
    $(edit).hide();
    $(this).parent().removeClass("active");
  };
  return false;
});



// 멤버십 투표
$(".opended").find(".memeberTxts").show();
$(".tagTitle").click(function () {
  var memberTxt = $(this).next(".memeberTxts");
  if ($(memberTxt).css("display") == "none") {
    $(".memeberTxts").slideUp(300);
    $(".memberTag").removeClass("opended");
    $(this).parent(".memberTag").addClass("opended");
    $(memberTxt).slideDown(300);
  } else {
    $(this).parent(".memberTag").removeClass("opended");
    $(memberTxt).slideUp(300);
  };
});

// 투표신청
$(".tr_yn").hide();
$(".tr_sult").hide();

$("#radio_yn").change(function () {
  if ($(this).is(":checked") == true) {
    $(".tr_sult").hide();
    if ($(".applyTable").css("display") == "table") {
      $(".tr_yn").css("display", "table-row");
    } else if ($(".applyTable").css("display") == "block") {
      $(".tr_yn").css("display", "block");
    };
  };
});

$("#radio_sult").change(function () {
  if ($(this).is(":checked") == true) {
    $(".tr_yn").hide();
    if ($(".applyTable").css("display") == "table") {
      $(".tr_sult").css("display", "table-row");
    } else if ($(".applyTable").css("display") == "block") {
      $(".tr_sult").css("display", "block");
    };
  };
});



$(".sub_sel").change(function () {
  var sel_txt = $(this).children("option:selected").text();
  $(this).parent(".formElement").find("span").text(sel_txt);
});
