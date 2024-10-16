<?
  $site_path = '../HyAdmin/';
  require_once($site_path."include/lib.inc.php");
  require_once($site_path."lib/common.php"); //쇼핑몰추가

  $cateTable = "hy_category"; //PRODUCT 분류
  $goodsTable = "hy_sangpum"; //PRODUCT 상품

  //카테고리 선택이 없을경우
  if(!$part_idx){
    $queryP = "select * from $cateTable where (1=1) and CatDepth = '0' order by CatSort asc limit 1";
    $rsP = query($queryP,$dbcon);
    $rowP = mysql_fetch_array($rsP);
    $part_idx = $rowP[CatIdx];
  }

  //검색어있을경우
  if($search_str){
    $str_que = " and ReTitle like '%$search_str%'";
  }

  $part_idx = 1;

  //현재 카테고리정보
  $queryS = "select * from $cateTable where CatIdx = '$part_idx'";
  $rsS = query($queryS,$dbcon);
  $rowS = mysql_fetch_array($rsS);
  $CatCodeC = $rowS[CatCode]; //현재카테고리 코드
  $CatNameC = $rowS[CatName]; //현재카테고리 이름

  $CatCodeArr = explode("/",$CatCodeC);
  $CatCodeF1 = $CatCodeArr[0]; //1차카테고리 코드
  $CatCodeF2 = $CatCodeArr[1]; //2차카테고리 코드
  $CatCodeF3 = $CatCodeArr[2]; //3차카테고리 코드

  //1차 카테고리 이름구하기
  $queryF1 = "select * from $cateTable where CatIdx='$CatCodeF1'";
  $rsF1 = query($queryF1,$dbcon);
  $countF1 = mysql_num_rows($rsF1);
  if($countF1){
    $rowF1 = mysql_fetch_array($rsF1);
    $CatIdxF1 = $rowF1[CatIdx]; //1차카테고리 번호
    $CatNameF1 = $rowF1[CatName]; //1차카테고리 이름
    $CatCodeF1 = $rowF1[CatCode]; //1차카테고리 코드
  }

  //2차 카테고리 이름구하기
  $queryF2 = "select * from $cateTable where CatIdx='$CatCodeF2'";
  $rsF2 = query($queryF2,$dbcon);
  $countF2 = mysql_num_rows($rsF2);
  if($countF2){
    $rowF2 = mysql_fetch_array($rsF2);
    $CatIdxF2 = $rowF2[CatIdx]; //2차카테고리 번호
    $CatNameF2 = $rowF2[CatName]; //2차카테고리 이름
    $CatCodeF2 = $rowF2[CatCode]; //2차카테고리 코드
  }

  //3차 카테고리 이름구하기
  $queryF3 = "select * from $cateTable where CatIdx='$CatCodeF3'";
  $rsF3 = query($queryF3,$dbcon);
  $countF3 = mysql_num_rows($rsF3);
  if($countF3){
    $rowF3 = mysql_fetch_array($rsF3);
    $CatIdxF3 = $rowF3[CatIdx]; //3차카테고리 번호
    $CatNameF3 = $rowF3[CatName]; //3차카테고리 이름
    $CatCodeF3 = $rowF3[CatCode]; //3차카테고리 코드
  }

  //출력순서 설정
  if($search_item){
    if($search_item == "1"){
      $orderWh = "order by ReTitle asc";
    }else if($search_item == "2"){
      $orderWh = "order by ReShopPrice desc";
    }else if($search_item == "3"){
      $orderWh = "order by ReShopPrice asc";
    }else if($search_item == "4"){
      $orderWh = "order by ReIdx desc";
    }
  }else{
    $orderWh = "order by ReOrder desc, ReIdx desc";
  }

  //전체상품수
  $queryH = "select * from $goodsTable where ReCatCode like '$CatCodeC%' $str_que";
  $rsH = query($queryH,$dbcon);
  $countH = mysql_num_rows($rsH);

  if(!$scale){
    $scale = "20"; //리스트수
  }
  $pagescale = "10"; //페이지수

  if(!$start) $start=0; //시작페이지

  $queryN = "select * from $goodsTable where ReCatCode like '$CatCodeC%' $str_que $orderWh limit $start,$scale";
  $rsN = query($queryN,$dbcon);
  $countN = mysql_num_rows($rsN);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no" />
  <meta property="og:image" content="/images/common/linkkakao_bar.jpg">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE-Edge" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="Googlebot" content="noindex, nofollow">
  <meta name="Naverbot" content="noindex, nofollow">
  <meta name="Daumoa" content="noindex, nofollow">
  <script src="../js/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="../css/common.css?v=231215" />
  <link rel="stylesheet" type="text/css" href="../css/sub.css" />
  <link rel="icon" href="../images/common/favicon.png" type="image/x-icon">
  <title>풍류사운드</title>
</head>

<body>
<!-- 헤더 -->
<header class="header">
  <div class="header__head">
    <div class="header__top">
      <div class="center_box">
        <ul class="header__sns">
          <li><a href="http://pf.kakao.com/_wBPdxj" target="_blank"><img src="../images/common/sns01.png" alt="카카오"></a></li>
          <li><a href="https://youtube.com/@dangchanuni" target="_blank"><img src="../images/common/sns02.png" alt="유튜브"></a></li>
          <li><a href="https://www.instagram.com/pungryusound/" target="_blank"><img src="../images/common/sns03.png" alt="인스타"></a></li>
          <li><a href="https://blog.naver.com/ateliergarak" target="_blank"><img src="../images/common/sns04.png" alt="블로그"></a></li>
          <li><a href="https://cafe.naver.com/huizhoucommunitys" target="_blank"><img src="../images/common/sns05.png" alt="네이버카페"></a></li>
        </ul>
        <h1 class="header__logo"><a href="https://aherher.github.io/websites/poongryu/"><img src="../images/common/logo.png" alt=""></a></h1>
        <ul class="header__gnb">

          <li><a href="#!">로그인</a></li>
          <li><a href="#!">회원가입</a></li>

          <li><a href="../online/sub01.html">문의하기</a></li>
          <li><a href="#!">장바구니</a></li>
          <li><a href="#!">마이페이지</a></li>

        </ul>
      </div>
    </div>
    <nav class=" header__menuWrap">
      <ul class="header__menu">
        <li><a href="../about/sub01.html">풍류사운드란?</a>
          <ul class="header__sub_menu">
            <li><a href="../about/sub01.html">학원소개</a></li>
            <li><a href="../about/sub02.html">코치소개</a></li>
            <li><a href="../about/sub04.html">오시는 길</a></li>
          </ul>
        </li>
        <li><a href="../education/sub00.html">교육서비스</a>
          <ul class="header__sub_menu">
            <li><a href="../education/sub00.html">교육안내</a></li>
            <li><a href="../education/sub01.htm">교육신청</a></li>
          </ul>
        </li>
        <li><a href="../community/sub01.html">커뮤니티</a>
          <ul class="header__sub_menu">
            <li><a href="../community/sub01.html">당찬언니 칼럼</a></li>
            <li><a href="../community/sub01.html">부모님 인터뷰</a></li>
          </ul>
        </li>
        </li>
        <li><a href="../employment/sub01.html">채용</a>
          <ul class="header__sub_menu">
            <li><a href="../employment/sub01.html">채용안내</a></li>
            <li><a href="../employment/sub02.html">입사지원</a></li>
          </ul>
        </li>
        <li><a href="../online/sub01.html">문의하기</a>
          <ul class="header__sub_menu">
            <li><a href="../online/sub01.html">온라인 문의</a></li>
            <li><a href="../online/sub02.html">샘플수업 신청</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="header__menu_btn"><span></span></div>
  </div>
  <div class="header__Bg"></div>
</header>
<!-- 헤더 끝 -->

<script>
  function telaskgo(){
    alert("전화문의 상품입니다.");
  }

  function gaegogo(){
    alert("상품 재고수량이 부족합니다.");
  }
</script>

<script>

  function goodsBuySendit(str1,str2){
  	var form=document.fitem;

		if(str2==1) { // 장바구니

			if(confirm("상품을 장바구니에 추가하시겠습니까?")){
			  form.target = "hidcart";
        form.action = "/shop/cart_once_ok.php?buy_goods_cnt=1&ReIdx="+str1;
        form.submit();
      }

		} else if(str2==2) { // 바로구매

	    if(confirm("교육을 신청하시겠습니까?")){
	      form.target = "";
	      form.action="order_temp_ok.php?buy_goods_cnt=1&ReIdx="+str1;
			  form.submit();
			}

		}

  }

</script>

<style>
/*페이지넘버 New*/
.list_top_padd{padding-top:25px; text-align:center; font-size:16px; display:none;}
.list_b_number {padding:3px; MARGIN:3px; TEXT-ALIGN: center}
.list_b_number A {padding:5px 8px 4px 8px; MARGIN: 2px; BORDER: #ccc 1px solid; COLOR: #888; TEXT-DECORATION: none}
.list_b_number A:hover {BORDER:#888 1px solid; COLOR: #555;}
.list_b_number A:active {BORDER:#888 1px solid; COLOR: #555;}
.list_b_number .current {BORDER: <?=$bbsColorBg?> 1px solid; padding:5px 8px 4px 8px; FONT-WEIGHT: bold; MARGIN: 2px; COLOR: <?=$bbsColorBg?>;}
.list_b_number .disabled {BORDER: #ddd 1px solid; padding:5px 8px 4px 8px; MARGIN: 2px; COLOR: #ccc;}
/*페이지넘버 New*/
</style>

<iframe src="" name="hidcart" marginwidth=0 marginheight=0 height=0 width=0 scrolling=no border=0 frameborder=0></iframe>

<form method="post" name="fitem">
</form>

<section class="subVisual">
  <dl>
    <dt>교육서비스</dt>
    <!-- <dd>자신감 넘치는 아이들의 아지트!</dd> -->
  </dl>
</section>

<main class="subContents">
  <div class="center_box">
    <h2 class="subpage_title">교육신청</h2>
    <p class="comment">교육회원 수강기간 동안 풍류사운드 교육의 모든 영상강의가 제공되며 승급심사 및 정기발표회에 참여하실 수 있습니다.</p>

    <?
      for($i=0; $i<$countN; $i++){
        $rowN = mysql_fetch_array($rsN);

        //파일실존여부
				if($rowN[ReFile1]){
				  $is_file_exist = file_exists("../HyAdmin/upload/goodFile/".$rowN[ReFile1]);
				}
        if($is_file_exist) $fileYes = "Y";
        else $fileYes = "N";
		?>

    <div class="education">
      <div class="education__img"><?if($rowN[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<?=$rowN[ReFile1]?>" alt=""><?}?></div>
      <div class="education__text">
        <p class="title"><?=$rowN[ReTitle]?></p>
        <p class="inText"><?=nl2br($rowN[ReDigest])?></p>
      </div>
      <div class="education__price">
        <div>
          <?if($rowN[ReOldPrice] > 0){?>
          <dl>
            <dt>수강료</dt>
            <dd class="price"><?=number_format($rowN[ReOldPrice])?><span>원</span></dd>
          </dl>
          <?}?>
          <dl>
            <dt>할인가</dt>
            <dd class="sale"><?=number_format($rowN[ReShopPrice])?><span>원</span></dd>
          </dl>
          <ul class="education__btns">
          <li class="button01"><a href="/education/sub01_view.html">상세설명</a></li>
          <li class="button02">

            <?if($rowN[ReShopPrice] > 0){?>

              <? if(!$rowN[ReUnlimit]) { ?>
	              <? if( $rowN[ReNumber] < 1 ){ ?>
                  <a href="javascript:gaegogo();">
                <?}else{?>
                  <a href="javascript:goodsBuySendit('<?=$rowN[ReIdx]?>','2');">
                <?}?>
              <?}else{?>
                <a href="javascript:goodsBuySendit('<?=$rowN[ReIdx]?>','2');">
              <?}?>

            <?}else{?>
              <a href="javascript:telaskgo();">
            <?}?>

              신청하기
            </a>
          </li>
          </ul>
       </div>
      </div>
    </div>

    <?}?>

  </div>


  <!-- 상품 등록된 상품이 없는 경우 -->
  <div>
	  <? if(!$countH) {?>
	  <div style="width:100%;height:200px;font-size:15px;text-align:center;border-bottom:solid 1px #dddcdc;" valign=middle><br><br><br><br>등록된 상품이 없습니다.</div>
	  <?}?>
  </div>
  <!-- 상품 등록된 상품이 없는 경우 -->


  <!--네이게이션-->
  <?if($countH){?>
  <div class="list_top_padd">
    <div>
      <p>
        <div class="list_b_number">

          <?
            $page=  floor($start/($scale*$pagescale)) ;
            $tmp_prev = $start - $scale; // 이전 누르면 찾아갈 곳
            $tmp_next = $start + $scale; // 다음 누르면 찾아갈 곳
          ?>

          <div class="list_top_padd">
            <div>
              <p>
                <div class="list_b_number">

                  <?
                    if($start+1 > $scale*$pagescale){
              		    $pre_start= $start - $scale*$pagescale ;
                      echo "<a href='$_SERVER[PHP_SELF]?part_idx=$part_idx&search_item=$search_item&start=$pre_start'><<</a>";

              		  }
              		?>

                  <?
                    if($start > 1){
                      echo "<a href='$_SERVER[PHP_SELF]?part_idx=$part_idx&search_item=$search_item&start=$tmp_prev'><  이전</a>";
                    }else{
                      echo "<span class='disabled'><  이전</span>";
                    }
                  ?>

                  <?
                    for($vj=0; $vj < $pagescale ; $vj++){
                		  $ln = ($page * $pagescale + $vj)*$scale ;
                		  $vk= $page * $pagescale + $vj+1 ;
                		  if($ln<$countH){
                			  if($ln!=$start){
                          echo "<a href='$_SERVER[PHP_SELF]?part_idx=$part_idx&search_item=$search_item&start=$ln'>$vk</a>";
                        }else{
                          echo "<span class='current'>$vk</span>";
                        }
                      }
                    }
                  ?>

                  <?
                    if($countH>=$start+$scale){
                  		echo "<a href='$_SERVER[PHP_SELF]?part_idx=$part_idx&search_item=$search_item&start=$tmp_next'>다음  ></a>";
                  	}else{
                  	  echo "<span class='disabled'>다음  ></span>";
                  	}
                  ?>

                  <?
                    if ($countH > (($page+1)*$scale*$pagescale)){
              		    $n_start=($page+1)*$scale*$pagescale ;

              		    echo "<a href='$_SERVER[PHP_SELF]?part_idx=$part_idx&search_item=$search_item&start=$n_start'>>></a>";

              		  }
                  ?>

                </div>
              </p>
            </div>
          </div>


        </div>
      </p>
    </div>
  </div>
  <br><br><br><br>
  <?}?>
  <!--네이게이션-->


</main>
<footer class="footer">
  <div class="center_box foot">
    <div class="foot__etc">
      <ul class="foot__btns">
        <li><a href="../etc/sub02.html">이용약관</a></li>
        <li><a href="../etc/sub01.html">개인정보취급방침</a></li>
        <li><a href="../online/sub01.html">온라인 문의</a></li>
        <li><a href="../about/sub04.html">오시는 길</a></li>
      </ul>
    </div>
    <div class="foot__info">
      <p class="foot__logo">풍류사운드</p>
      <p class="foot__txts mb10"><span>경기도 광명시 신기로15 에스프라자 6층 605호</span><span>대표자. 한금채 원장</span><span class="call">T. 010-5198-9969</span></p>
      <p class="foot__txts mb10"><span>사업자등록번호. 238-01-01687</span><span>통신판매업허가번호. 2023-경기광명-0000</span></p>
      <p class="foot__txts">COPYRIGHT © 2022 PUNGRYU SOUND. ALL RIGHTS RESERVED</p>
    </div>
  </div>
</footer>
<script src="../js/layout.js"></script>

</body>

</html>
