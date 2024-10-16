<?
  $site_path = '../HyAdmin/';
  require_once($site_path."include/lib.inc.php");
  require_once($site_path."lib/common.php"); //쇼핑몰추가
  
  $cateTable = "hy_category"; //PRODUCT 분류
  $goodsTable = "hy_sangpum"; //PRODUCT 상품
  $todayTable = "hy_todays"; //오늘본상품
  
  //쇼핑몰설정
  $queryA = "select * from hy_shop_cfg order by ReIdx asc limit 1";
  $rsA = query($queryA,$dbcon);
  $rowA = mysql_fetch_array($rsA);
  
  //세션정보
  $ss_mb_idChk = $_SESSION['ss_mb_id']; //회원아이디
  $ss_mb_levelChk = $_SESSION['ss_mb_level']; //회원등급

	//최근본상품 DB입력
	$today_oid = $CART;
	$queryT = "select * from $todayTable where ReTodayNum='$today_oid' and ReGoodNum='$ReIdx'";
	$rsT = query($queryT,$dbcon);
	$countT = mysql_num_rows($rsT);
	
	if($countT==0){
		$ReInDate = date("Y-m-d");
		$ReInTime = date("H:i;s");
		$queryTS = "insert into $todayTable values('','$today_oid','$ReIdx','$ReInDate','$ReInTime')";
		query($queryTS,$dbcon);
	}
	
	// 상품 조회수 증가
	$queryH = "update $goodsTable set ReHit = ReHit+1 where ReIdx = '$ReIdx'";
	query($queryH,$dbcon);
	
	//상품정보
	$queryS = "select * from $goodsTable where ReIdx = '$ReIdx'";
	$rsS = query($queryS,$dbcon);
	$rowS = mysql_fetch_array($rsS);
	
	//상품가격
  $shop_priceIn = $rowS[ReShopPrice]; 
  
  //옵션있는지 체크
	$opischk01 = ""; $opischk02 = ""; $opischk03 = ""; $opischk04 = ""; $opischk05 = ""; $opischk06 = ""; $opischk07 = "";
	
	if ($rowS[ReOptNum7] > 0) {
	  $opischk01 = ""; $opischk02 = ""; $opischk03 = ""; $opischk04 = ""; $opischk05 = ""; $opischk06 = ""; $opischk07 = "Y";
	}elseif ($rowS[ReOptNum6] > 0) {
	  $opischk01 = ""; $opischk02 = ""; $opischk03 = ""; $opischk04 = ""; $opischk05 = ""; $opischk06 = "Y"; $opischk07 = "";
	}elseif ($rowS[ReOptNum5] > 0) {
	  $opischk01 = ""; $opischk02 = ""; $opischk03 = ""; $opischk04 = ""; $opischk05 = "Y"; $opischk06 = ""; $opischk07 = "";
	}elseif ($rowS[ReOptNum4] > 0) {
	  $opischk01 = ""; $opischk02 = ""; $opischk03 = ""; $opischk04 = "Y"; $opischk05 = ""; $opischk06 = ""; $opischk07 = "";
	}elseif ($rowS[ReOptNum3] > 0) {
	  $opischk01 = ""; $opischk02 = ""; $opischk03 = "Y"; $opischk04 = ""; $opischk05 = ""; $opischk06 = ""; $opischk07 = "";
	}elseif ($rowS[ReOptNum2] > 0) {
	  $opischk01 = ""; $opischk02 = "Y"; $opischk03 = ""; $opischk04 = ""; $opischk05 = ""; $opischk06 = ""; $opischk07 = "";
	}elseif ($rowS[ReOptNum1] > 0) {
	  $opischk01 = "Y"; $opischk02 = ""; $opischk03 = ""; $opischk04 = ""; $opischk05 = ""; $opischk06 = ""; $opischk07 = "";
	}
	
	//옵션이 없을경우
	if($opischk01 == "" && $opischk02 == "" && $opischk03 == "" && $opischk04 == "" && $opischk05 == "" && $opischk06 == "" && $opischk07 == ""){
	  $optWalra = "Y";
	}
	
	//상품 포인트 계산
  if($rowS[RePointChk] == "1"){ //상점포인트적용
    $ReGoodsPointPer = $rowA[RePointBasic];
    $ReGoodsPointIn = round($rowS[ReShopPrice]*$rowA[RePointBasic]*0.01);
  }else if($rowS[RePointChk] == "2"){ //포인트없음
    $ReGoodsPointPer = 0;
    $ReGoodsPointIn = 0;
  }else if($rowS[RePointChk] == "3"){ //개별포인트적용
    $ReGoodsPointPer = $rowS[RePoint];
    $ReGoodsPointIn = round($rowS[ReShopPrice]*$rowS[RePoint]*0.01);
  }else{
    $ReGoodsPointPer = 0;
    $ReGoodsPointIn = 0;
  }
	
?>

<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopTop01.php"; ?>

<link href="/shop/css/shopcss.css" rel="stylesheet" type="text/css">


<?if($optWalra == "Y"){?>
  <? include "include/viewone_js.php"; ?>
<?}else{?>
  <? include "include/viewmulti_js.php"; ?>
<?}?>  


<style>
/*멀티옵션 추가 레이어*/
.the_info {text-align:left; width:100%;}
.the_info tr td, .the_info tr th {vertical-align:top; height:39px; font-size:16px; color:#222222; line-height:1.6; text-align:left;}
.the_info .op_input td {background-color:#fff; vertical-align:middle;  border:1px solid #ddd; padding-left:10px;}
.the_info .op_input td .opi_box {font-size:15px; position:relative;}  
  
.the_info .ch_input td {background-color:#fff; vertical-align:middle;  border:1px solid #ddd; padding-left:10px;}
.the_info .ch_input td .chi_box {font-size:15px; position:relative;}
.chi_box .ch_name {display:inline-block; width:250px;}
.chi_box .ch_eq {width:30px; height:20px;}
.chi_box .ch_price {position:absolute; right:40px;}
.chi_box .chaddnsub {display:inline-block; position:relative; width:18px; height:24px; vertical-align:middle; margin-left:5px;}
.chi_box .chaddnsub span {display:block; width:100%; height:9px;  position:absolute; }
.chi_box .chaddnsub .add_eq {top:-10px;}
.chi_box .chaddnsub .sub_eq {bottom:10px; }
.chi_box .close_ch {position:absolute; right:14px; display:block; top:0px; width:11px; height:11px;   }
</style>   


<script language="javascript">
<!--
// 롤오버 제품확대보기
function viewBigImg(Val) {
	document.bigimg.src=Val;
}

// 제품확대이미지오픈
function goodsImagesView(){
	var winleft = (screen.width - 642) / 2;
	var wintop = (screen.height - 414) / 2;
	window.open("product_zoom.php?goods_data=<?=$mv_data;?>","","scrollbars=no, width=600, height=580, top="+wintop+", left="+winleft+"");
}

// 친구에게 추천하기
function sendMail(goods_idx) {
	window.open("mail_to_friend.php?goods_idx="+goods_idx, "","scrollbars=no, width=484, height=430, top=200, left=200");
}

// 리뷰작성
function reviewWinOpen() {
	window.open("product_after.php?goods_data=<?=$goods_data;?>", "","scrollbars=no, width=484, height=400, top=200, left=200");
}

// QnA작성
function qnaWinOpen() {
	window.open("product_qna.php?goods_data=<?=$goods_data;?>", "","scrollbars=no, width=484, height=400, top=200, left=200");
}

-->
</script>


<script language="javascript">
<!--
  
	// 자동으로 콤마 넣기
  function number_format(num) {
    num = num.replace(/,/g, "")
    var num_str = num.toString()
    var result = ''
	 
    for(var i=0; i<num_str.length; i++) {
      var tmp = num_str.length-(i+1)
      if(i%3==0 && i!=0) result = ',' + result
      result = num_str.charAt(tmp) + result
    }
	 
    return result
  }
	   
	   
	function goList01(){
	  location.href = "/HyAdmin/list.php?bbs_id=bo02";
	}
	function goWrite01(str1){
	  location.href = "/HyAdmin/write.php?bbs_id=bo02&gochk="+str1;
	}
	function goList02(){
	  location.href = "/HyAdmin/list.php?bbs_id=bo03";
	}
	function goWrite02(str1){
	  location.href = "/HyAdmin/write.php?bbs_id=bo03&gochk="+str1;
	}
  function loginChk(){
	  if(confirm("로그인 후 이용가능합니다. 로그인 하시겠습니까?")){
	    location.href = "/HyAdmin/mb_login.php";
	  }
	}

//-->
</script>

<style>
  
.product_info {overflow:hidden; margin-bottom:100px;}  
.product_img_wrap {float:left;}
.product_thum {}
.product_thum li {width:74px; margin:12px 11px 0 0; float:left; cursor:pointer; box-sizing:border-box; border:1px solid #ddd;}
.product_thum li:nth-child(6n-6) {margin-right:0;}
.product_thum .prd_on {border:2px solid #333;}
.product_thum li img {width:100%;}
.right_info {float:right; width:600px;}
.right_info h2 {margin-bottom:15px; font-size:23px; color:#333; text-align: left;}
.right_info .pro_sbt {color:#727272; font-size:16px;}
.right_info button {width:195px; height:62px; color:#333333; font-size:17px; font-weight:700; border:1px solid #ddd; box-sizing:border-box;}
.info_wrap {border:2px solid #5e5e5e; border-right:0; border-left:0; background-color:#fafafa; padding:40px 52px; margin-top:46px;}
.thr_btns {width:100%; margin-top:30px;}
.thr_btns li {float:left; margin-right:7px;}
.thr_btns li:last-child {margin-right:0;}
.thr_btns .sell {background-color:#333333; color:#fff;}
.thr_btns .basket {background-color:#fff;}
.thr_btns .onList {background-color:#fff; color:#454545 !important;}
.total_price {position:relative; margin-top:30px;}
.total_price .tp_txt {font-size:20px; font-weight:700; color:#333333;}
.total_price .the_totalprice {text-align:right; position:absolute; right:0; color:#333333; font-size:20px; font-weight:700;}
.total_price .the_totalprice b {font-size:30px; color:#db0000;}
.indetail_info {clear:both;}
.indetail_info .sub_product {margin-top:0;}
.subIn_tabs {height:45px; width:100%; border-bottom:1px solid #ddd; margin-bottom:50px;}
.subIn_tabs li {float:left;}
.subIn_tabs li a {padding:15px 40px; font-size:14px; color:#585858; background-color:#f8f8f8; border:1px solid #ddd; border-right:none; border-bottom:none; display:block;}
.subIn_tabs li:last-child a {border-right:1px solid #ddd;}
.subIn_tabs .move_on {background-color:#fff; color:#333; font-weight:700; overflow:hidden; height:15px;}
  
</style>

<script>
  function productlistgo(){
    location.href = "/shop/sangpum_list.php";
  }
</script>

  <!-- 상품정보 -->
  
  <form method="post" name="fitem">
  <input type="hidden" name="hidden_shop_price" value="<?=$shop_priceIn;?>">
	<input type="hidden" name="hidden_tot_shop_price" value="<?=$shop_priceIn;?>">
	<input type="hidden" name="hidden_op1_price" value="0">
	<input type="hidden" name="hidden_op2_price" value="0">
	<input type="hidden" name="hidden_op3_price" value="0">
	<input type="hidden" name="hidden_op4_price" value="0">
	<input type="hidden" name="hidden_op5_price" value="0">
	<input type="hidden" name="hidden_op6_price" value="0">
	<input type="hidden" name="hidden_op7_price" value="0">
	<input type="hidden" name="point_js" value="<?=$rowS[RePoint] * 0.01;?>">
	
    <div class="aboutClass">

      <div class="aboutClass__right">
        <div class="aboutClass__image"><?if($rowS[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<?=$rowS[ReFile1];?>" alt=""><?}?></div>

        <div class="aboutClass__price education__price">
          <div>
            <p class="title"><?=$rowS[ReTitle];?></p>
            <dl class="mb10">
              <dt>적립금</dt>
              <dd class="price point"><?=$ReGoodsPointIn?>P</dd>
            </dl>
            
            <?if($rowS[ReOldPrice]){?>
            <dl class="mb10">
              <dt>수강료</dt>
              <dd class="price"><?=number_format($rowS[ReOldPrice]);?><span>원</span></dd>
            </dl>
            <dl>
              <dt>할인가</dt>
              <dd class="sale"><?=number_format($rowS[ReShopPrice]);?><span>원</span></dd>
            </dl>
            <?}else{?>
            <dl>
              <dt>수강료</dt>
              <dd class="sale"><?=number_format($rowS[ReShopPrice]);?><span>원</span></dd>
            </dl>
            <?}?>
            <input type="hidden" name="buy_goods_cnt" value="1" class="quan">
            
            
            
            <input type="hidden" name="hidden_all_text" value="">
          
            <input type="hidden" name="hidden_mu1_tit" value="">
          	<input type="hidden" name="hidden_mu2_tit" value="">
          	<input type="hidden" name="hidden_mu3_tit" value="">
          	<input type="hidden" name="hidden_mu4_tit" value="">
          	<input type="hidden" name="hidden_mu5_tit" value="">
          	<input type="hidden" name="hidden_mu6_tit" value="">
          	<input type="hidden" name="hidden_mu7_tit" value="">
          	<br>
            <input type="hidden" name="hidden_mu1_text" value="">
            <input type="hidden" name="hidden_mu2_text" value="">
            <input type="hidden" name="hidden_mu3_text" value="">
            <input type="hidden" name="hidden_mu4_text" value="">
            <input type="hidden" name="hidden_mu5_text" value="">
            <input type="hidden" name="hidden_mu6_text" value="">
            <input type="hidden" name="hidden_mu7_text" value="">
            <br>
            <input type="hidden" name="hidden_mu1_price" value="0">
          	<input type="hidden" name="hidden_mu2_price" value="0">
          	<input type="hidden" name="hidden_mu3_price" value="0">
          	<input type="hidden" name="hidden_mu4_price" value="0">
          	<input type="hidden" name="hidden_mu5_price" value="0">
          	<input type="hidden" name="hidden_mu6_price" value="0">
          	<input type="hidden" name="hidden_mu7_price" value="0">
          	<br>
            <input type="hidden" name="hidden_mu1_grade" value="">
          	<input type="hidden" name="hidden_mu2_grade" value="">
          	<input type="hidden" name="hidden_mu3_grade" value="">
          	<input type="hidden" name="hidden_mu4_grade" value="">
          	<input type="hidden" name="hidden_mu5_grade" value="">
          	<input type="hidden" name="hidden_mu6_grade" value="">
          	<input type="hidden" name="hidden_mu7_grade" value="">
          	<br>
          	<input type="hidden" name="opischk01" value="<?=$opischk01?>">
          	<input type="hidden" name="opischk02" value="<?=$opischk02?>">
          	<input type="hidden" name="opischk03" value="<?=$opischk03?>">
          	<input type="hidden" name="opischk04" value="<?=$opischk04?>">
          	<input type="hidden" name="opischk05" value="<?=$opischk05?>">
          	<input type="hidden" name="opischk06" value="<?=$opischk06?>">
          	<input type="hidden" name="opischk07" value="<?=$opischk07?>">
          	
          	
            <!-- 멀티옵션 레이어 -->            
            <input type="hidden" name="layviewnum" value="1">
            <?
              for($ku=1;$ku<40;$ku++){
            ?>
                <input type="hidden" name="realprice<?=$ku?>" id="realprice<?=$ku?>" value="0">
                <input type="hidden" name="realtit<?=$ku?>" id="realtit<?=$ku?>" value="">
                <input type="hidden" name="viewyes<?=$ku?>" id="viewyes<?=$ku?>" value="">
                <input type="hidden" name="opttitname<?=$ku?>" id="opttitname<?=$ku?>" value="">
                <input type="hidden" name="opttitvalue<?=$ku?>" id="opttitvalue<?=$ku?>" value="">
                <input type="hidden" name="prich<?=$ku?>" id="prich<?=$ku?>" value="1" class="ch_eq">
            <?}?>
            <!-- 멀티옵션 레이어 -->   
            
            <input type="hidden" name="layerpricetot" id="layerpricetot" value="0">
            
            
            <ul class="buttons education__btns">
              <li class="button01"><a href="javascript:goodsBuySendit(1);">장비구니</a></li>
              <li class="button02"><a href="javascript:goodsBuySendit(2);">신청하기</a></li>
            </ul>
          </div>
        </div>
      </div>
      
      
             
      <div class="aboutClass__left">
        <p class="aboutClass__title"><?=$rowS[ReTitle];?></p>
        <div class="aboutClass__box">
          <p class="aboutClass__text">
            <?=nl2br($rowS[ReDigest]);?>
          </p>
        </div>
        
        <?
          $ReDigest2Arr = explode("\r",$rowS[ReDigest2]);
          $ReDigest2Count = count($ReDigest2Arr);
        ?>
        <div class="aboutClass__box">
          <p class="aboutClass__subtitle">유형</p>
          <?for($k=0;$k<$ReDigest2Count;$k++){?>
          <p class="aboutClass__text mb10"><?=$ReDigest2Arr[$k]?></p>
          <?}?>
        </div>
        
        <?
          $ReDigest3Arr = explode("\r",$rowS[ReDigest3]);
          $ReDigest3Count = count($ReDigest3Arr);
        ?>
        <div class="aboutClass__box">
          <p class="aboutClass__subtitle">혜택</p>
          <?for($k=0;$k<$ReDigest3Count;$k++){?>
          <p class="aboutClass__text mb10"><?=$ReDigest3Arr[$k]?></p>
          <?}?>
        </div>

        <div>
          <p class="aboutClass__subtitle">주의사항</p>
          <p class="aboutClass__text">1. 솔루션 구매 후 환급을 요청하는 경우 위약금이 발생하며, 당사의 사정으로 인한 환급 시
            위약금 차감은 제외됩니다.</p>
          <p class="aboutClass__text">2. 환급 시 실제 수강한 부분에 해당하는 개별 토픽 영상 금액과 교육 영상 금액 그리고 사용한
            그룹레슨 및 개인 레슨 수강료, 상품 비용은 공제합니다.</p>
          <p class="aboutClass__text">3. 환급 요청 시 영상강의 수강 없이 오프라인 레슨만 수강한 경우 레슨료는 비회원가로
            공제합니다.</p>
          <p class="aboutClass__text">4. 솔루션 시작일은 결제일에 해당하는 달 또는 익월부터 적용되며, 시작일 변경은 불가합니다.</p>
          <p class="aboutClass__text mb40">5. 솔루션 가입 기간 중 개인 사유로 인한 이용정지는 불가하며, 계약해제/해지(환불) 처리됩니다.</p>

          <p class="aboutClass__text">*홈페이지 하단 이용약관을 확인해주시기 바랍니다.</p>
        </div>

      </div>

    </div>

  </form>
  

<iframe src="" name="hidcart" marginwidth=0 marginheight=0 height=0 width=0 scrolling=no border=0 frameborder=0></iframe> 
  
  <script language="javascript"> 
    function idcheckifr(){
      if(mb_form.mb_id.value=="") {
  			alert("회원 아이디를 입력해 주세요.");
  			mb_form.mb_id.focus();
  	  }else{
        document.mb_form.target = "hidcart";
        document.mb_form.action = "/shop/cart_once_ok_multi.php";
        document.mb_form.submit(); 
      }
    }
  </script> 



<style>
.detail_infowrap {margin-top:35px;}
.detail_tabs {overflow:hidden; margin-bottom:35px;}
.detail_tabs li {float:left; /*width:33.33333%;*/ width:50%; box-sizing:border-box; border:1px solid #ddd; border-right:none; text-align:center; height:45px; line-height:45px;}
.detail_tabs li:last-child {border-right:1px solid #ddd;}
.detail_tabs li a {font-size:15px; display:block;}
.detail_tabs .dtab_on {background-color:#f8f8f8;}

.detail_infowrap .infos {margin-bottom:50px; overflow:hidden;}

.detail_infowrap .dei_section {/*text-align:center;*/ display:none;}
.detail_infowrap .dei_section img {max-width:100%;}

.detail_infowrap .reviews {width:100%;}
.detail_infowrap .reviews tr td, .reviews tr th {border:1px solid #ddd; border-left:none; border-right:none; color:#333; font-size:14px; padding:18px 0;}
.detail_infowrap .reviews .table_contents {display:none;}
.detail_infowrap .reviews .table_contents td {padding-bottom:60px;}
.detail_infowrap .reviews .table_contents td .rev_txt {background-color:#efefef; padding:18px 0 18px 90px; line-height:1.5;}

.detail_infowrap .brd_title {cursor:pointer;}
.detail_infowrap .brd_title .lock { margin-right:7px; text-align:top;}
.detail_infowrap .retexts {color:#999999; margin-right:15px; font-size:11px;}
.detail_infowrap .re_btns { float:right; margin-top:20px;}
.detail_infowrap .re_btns li {width:125px; line-height:40px; text-align:center; display:inline-block;}
.detail_infowrap .re_btns li a {display:block; font-size:13px;}
.detail_infowrap .re_btns .write_btn {color:#fff; background-color:#212121; margin-right:10px;}
.detail_infowrap .re_btns .write_btn a {color:#fff;}
.detail_infowrap .re_btns .list_btn {color:#454545; background-color:#fff; border:1px solid #ddd; box-sizing:border-box; font-weight:700;}
</style>  



<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopBottom.php"; ?>