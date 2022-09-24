<?
  if($bbs_id == "bo01"){
    $arrTit = "공지사항";
  }elseif($bbs_id == "bo02"){
    $arrTit = "행사 사진첩";
  }elseif($bbs_id == "bo03"){
    $arrTit = "Q&A";
  }
?>

<? include "../inc/header.html"; ?>

<!-- 서브 비주얼 -->
<section class="subVisual subVisual01">
  <h2>우리봄 소식</h2>
</section>
<!-- 서브 비주얼 끝-->
<? include "../inc/sub_select.html"; ?>
<script>
  let thisPage = "#sub05";
</script>

<main class="subContents">
  <div class="sub_center">
    <h3 class="pageTitle"><?=$arrTit?></h3>