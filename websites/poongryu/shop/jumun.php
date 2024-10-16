<?
  $site_path = '../HyAdmin/';
  require_once($site_path."include/lib.inc.php");
  require_once($site_path."lib/common.php"); //쇼핑몰추가

  $cartTable = "hy_cartwish"; //장바구니 테이블
  $shopcfgTable = "hy_shop_cfg"; //쇼핑몰성정 테이블
  $memberTable = "hy_member"; //회원 테이블
  $sangpumTable = "hy_sangpum"; //상품 테이블
  $tempTable = "hy_carttemp"; //임시 테이블

  //쇼핑몰설정정보
  $queryA = "select * from $shopcfgTable order by ReIdx asc limit 1";
  $rsA = query($queryA,$dbcon);
	$rowA = mysql_fetch_array($rsA);

  $ReInDate = date("Y-m-d"); //오늘날짜
  $ReInTime = date("H:i:s"); //현재시간

  $ss_mb_idChk = $_SESSION['ss_mb_id']; //회원아이디

	// 회원체크
	if( !$nologin ) { //비회원주문으로 넘어온경우가 아니라면

		if( !$ss_mb_idChk ) {

			// 로그인 상태가 아니면 회원과 비회원을 선택을 하게 한다.
			$logchkurl = "jumun_login_check.php?login_go=".$_SERVER[REQUEST_URI];
			hy_href($logchkurl);

		}  else {

			// 만약에 회원이면 회원정보를 가지고 온다.
			$queryM = "select * from $memberTable where mb_id='$ss_mb_idChk'";
		  $rsM = query($queryM,$dbcon);
		  $rowM = mysql_fetch_array($rsM);
			$mb_numChk = $rowM[mb_num];
			$mb_idChk = $rowM[mb_id];
			$mb_nameChk = $rowM[mb_name];
			$mb_emailChk = $rowM[mb_email];
			$mb_postChk = $rowM[mb_post];
			$mb_address1Chk = $rowM[mb_address1];
			$mb_address2Chk = $rowM[mb_address2];
			$mb_tel = $rowM[mb_tel];
			$mb_mobile = $rowM[mb_mobile];
			$mb_telArr = explode("-",$mb_tel);
			$mb_mobileArr = explode("-",$mb_mobile);


			//배송지정보
			$queryT = "select * from hy_giveaddr where (1=1) and ReMemKey='$mb_numChk' and ReState='Y' order by ReIdx desc limit 1";
      $rsT = query($queryT,$dbcon);
      $countT = mysql_num_rows($rsT);
      if($countT){
        $rowT = mysql_fetch_array($rsT);
        $ReTelArr = explode("-",$rowT[ReTel]);
        $RePhoneArr = explode("-",$rowT[RePhone]);
      }

      //포인트정보
			$queryP = "select sum(RePoint) as RePointIn from hy_point where (1=1) and ReMemId='$mb_idChk'";
      $rsP = query($queryP,$dbcon);
      $rowP = mysql_fetch_array($rsP);
      $RePointTotal = $rowP[RePointIn];

		}

	}

	//이용약관,개인정보보호정책 불러오기
  $queryC = "select * from hy_site_cfg order by st_num asc limit 1";
  $rsC = query($queryC,$dbcon);
  $rowC = mysql_fetch_array($rsC);
?>

<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopTop01.php"; ?>

<link href="/shop/css/shopcss.css" rel="stylesheet" type="text/css">


<script language="JavaScript">
<!--
  function actionGo(){

    var formfrm = document.trade_form;

    if(formfrm.ReOrderName.value==""){
      alert("주문자 이름을 입력해 주세요.");
		  formfrm.ReOrderName.focus();
      return;
    }
    if(formfrm.ReOrderPhone1.value==""){
      alert("주문자 연락처를 입력해 주세요.");
		  formfrm.ReOrderPhone1.focus();
      return;
    }
    if(formfrm.ReOrderPhone2.value==""){
      alert("주문자 연락처를 입력해 주세요.");
		  formfrm.ReOrderPhone2.focus();
      return;
    }
    if(formfrm.ReOrderPhone3.value==""){
      alert("주문자 연락처를 입력해 주세요.");
		  formfrm.ReOrderPhone3.focus();
      return;
    }
    if(formfrm.ReOrderEmail.value==""){
      alert("주문자 이메일을 입력해 주세요.");
		  formfrm.ReOrderEmail.focus();
      return;
    }

    <?if( !$ss_mb_idChk ) {?>
    if(formfrm.ReOrderPass.value==""){
      alert("주문 비밀번호를 입력해 주세요.");
		  formfrm.ReOrderPass.focus();
      return;
    }
    if(formfrm.ReOrderPassChk.value==""){
      alert("비밀번호 확인을 입력해 주세요.");
		  formfrm.ReOrderPassChk.focus();
      return;
    }
    <?}?>


  if(formfrm.mallChk.value=="Y"){

    if(formfrm.ReDelivName.value==""){
      alert("수취인 이름을 입력해 주세요.");
		  formfrm.ReDelivName.focus();
      return;
    }
    if(formfrm.ReDelivAdd1.value==""){
      alert("수취인 주소를 입력해 주세요.");
		  formfrm.ReDelivAdd1.focus();
      return;
    }
    if(formfrm.ReDelivAdd2.value==""){
      alert("수취인 상세주소(번지)를 입력해 주세요.");
		  formfrm.ReDelivAdd2.focus();
      return;
    }
    if(formfrm.ReDelivPhone1.value==""){
      alert("수취인 연락처를 입력해 주세요.");
		  formfrm.ReDelivPhone1.focus();
      return;
    }
    if(formfrm.ReDelivPhone2.value==""){
      alert("수취인 연락처를 입력해 주세요.");
		  formfrm.ReDelivPhone2.focus();
      return;
    }
    if(formfrm.ReDelivPhone3.value==""){
      alert("수취인 연락처를 입력해 주세요.");
		  formfrm.ReDelivPhone3.focus();
      return;
    }
    if(formfrm.ReDelivEmail.value==""){
      alert("수취인 이메일을 입력해 주세요.");
		  formfrm.ReDelivEmail.focus();
      return;
    }

  }

    <?if( !$ss_mb_idChk ) {	?>
    if(formfrm.agree_check.checked==false){
      alert("개인정보 수집 이용에 동의해 주세요.");
      return;
    }
    <?}?>

    formfrm.submit();

  }


// 주문자정보와동일
var toggle=0;
function toggleCheck(v)
{

	var form=document.trade_form;
	if(v=="1"){
		form.ReDelivName.value	= form.ReOrderName.value;
		form.ReDelivEmail.value =form.ReOrderEmail.value;
		form.ReDelivPhone1.value = form.ReOrderPhone1.value;
		form.ReDelivPhone2.value = form.ReOrderPhone2.value;
		form.ReDelivPhone3.value = form.ReOrderPhone3.value;
		form.ReDelivZip.value = form.ReOrderZip.value;
		form.ReDelivAdd1.value = form.ReOrderAdd1.value;
		form.ReDelivAdd2.value = form.ReOrderAdd2.value;
  }else if(v=="2"){
		form.ReDelivName.value	= form.bae_name.value;
		form.ReDelivEmail.value =form.bae_email.value;
		form.ReDelivPhone1.value = form.bae_phone1.value;
		form.ReDelivPhone2.value = form.bae_phone2.value;
		form.ReDelivPhone3.value = form.bae_phone3.value;
		form.ReDelivZip.value = form.bae_zip1.value;
		form.ReDelivAdd1.value = form.bae_add1.value;
		form.ReDelivAdd2.value = form.bae_add2.value;
	} else if(v=="3"){
		form.ReDelivName.value	= "";
		form.ReDelivEmail.value = "";
		form.ReDelivPhone1.value = "";
		form.ReDelivPhone2.value = "";
		form.ReDelivPhone3.value = "";
		form.ReDelivZip.value	= "";
		form.ReDelivAdd1.value	= "";
		form.ReDelivAdd2.value	= "";
	}
}

//배송지팝업
function openbaesong(){
  theURL = "./my_baepop_list.php";
  window.open(theURL,"01","toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=700,height=600");
}
//-->
</script>


<script>
  //숫자만입력하게
  function onlyNumber(event){
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
      return;
    else
      return false;
  }

  function removeChar(event) {
    event = event || window.event;
    var keyID = (event.which) ? event.which : event.keyCode;
    if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 )
      return;
    else
      event.target.value = event.target.value.replace(/[^0-9]/g, "");
  }
</script>

<script>
  //배송시 요청사항 기타입력
  function delevetcfnc(str1){
    if(str1 == "4"){
      document.getElementById('deliv_etc').style.display = "";
    }else{
      document.getElementById('deliv_etc').style.display = "none";
    }
  }

  //현금영수증 열기
  function youngCheck(){
    var form=document.trade_form;
    if( document.getElementById('ReYoungsuYes').checked == true ) {
      document.getElementById('young_view').style.display = "";
    }else{
      document.getElementById('young_view').style.display = "none";
    }
  }

  //무통장입력 선택시
  function tradeCheck(str1) {
  	var form=document.trade_form;
  	if( str1 == "3" ) {
  		document.getElementById('methodView1').style.display = "";
  		document.getElementById('methodView2').style.display = "";
  		document.getElementById('methodView3').style.display = "";
  		document.getElementById('methodView4').style.display = "";
  	} else {
  		document.getElementById('methodView1').style.display = "none";
  		document.getElementById('methodView2').style.display = "none";
  		document.getElementById('methodView3').style.display = "none";
  		document.getElementById('methodView4').style.display = "none";
  	}
  }

  //포인트사용체크
  function pointUseGo(str1,str2){

    strin1 = Number(str1);
    strin2 = Number(str2);

    if(strin1 == "0" || strin1 == ""){
      alert("보유하신 포인트가 없습니다.");
    }else if(strin1 < strin2){
      msgview = "결제시 사용가능한 포인트는 "+strin2+"원 이상일때만 이용가능합니다.";
      alert(msgview);
    }else{
      document.getElementById('baeViewIn').style.display = "";
    }

  }

  //콤마찍기
  function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
  }

  //포인트사용 적용
  function pointApplyGo(){
    RePointEt = Number(trade_form.RePointChk.value); //사용포인트
    RePointCm = Number(trade_form.RePointMy.value); //사용가능한 포인트
    RePriceTotalBv = Number(trade_form.RePriceTotal.value); //총결제금액
    RePriceTotalUr = Number(trade_form.RePriceTotalOrg.value); //총결제금액 원본
    RePriceTradeAw = Number(trade_form.ReTradePrice.value); //총상품금액

    if(RePointEt > RePointCm){
      alert("사용가능한 포인트를 초과했습니다.");
      return;
    }else if(RePointEt > RePriceTotalUr){
      alert("사용포인트가 구매금액을 초과했습니다.");
      return;
    }

    trade_form.RePriceTotal.value = RePriceTotalUr; //총결제금액 초기화

    RePriceChage = Number(RePriceTotalUr) - Number(RePointEt); //사용포인트제외 총결제금액계산

    ReTradePriceChage = Number(RePriceTradeAw) - Number(RePointEt); //사용포인트제외 총상품금액계산


    trade_form.RePointUse.value = RePointEt; //사용포인트 적용
    trade_form.RePriceTotal.value = RePriceChage; //총결제금액 적용

    document.getElementById ( "usepointcur" ).innerHTML = comma(RePointEt); //사용포인트 텍스트적용
    document.getElementById ( "totalpricecur" ).innerHTML = comma(RePriceChage); //총결제금액 텍스트적용

    document.getElementById('baeViewIn').style.display = "none"; //포인트적용 레이어닫기

  }
</script>













<!-- 서브 내용 -->
<div class="subJu_contents">
  <!-- -->
  <section class="centerJu_box">
    <!--p class="secJu_title"><span>VUOKKOSET</span> 주문하기</p-->
    <!-- 주문 정보 -->


    <!-- 모바일상품정보 -->
    <?
		  $queryS = "select * from $tempTable where (1=1) and ReCartCode='$_SESSION[CARTTEMP]' order by ReIdx asc";
      $rsS = query($queryS,$dbcon);
      $countS = mysql_num_rows($rsS);

      $mallChk = "";
			for($k=0;$k<$countS;$k++){
        $rowS = mysql_fetch_array($rsS);

			  //옵션추가가격1
			  if($rowS[ReOptTitle1] && $rowS[ReOptCont1]){
			    $opt_nameIn1 = $rowS[ReOptTitle1];
			    $optName1Arr = explode("//",$rowS[ReOptCont1]);
			    $opt_selIn1 = $optName1Arr[0];
			    $opt_priIn1 = $optName1Arr[1];
			    $opt_addIn1 = $opt_nameIn1." : ".$opt_selIn1;
			  }else{
			    $opt_addIn1 = "";
			    $opt_priIn1 = 0;
			    $opt_selIn1 = "";
			  }
			  //옵션추가가격2
			  if($rowS[ReOptTitle2] && $rowS[ReOptCont2]){
			    $opt_nameIn2 = $rowS[ReOptTitle2];
			    $optName2Arr = explode("//",$rowS[ReOptCont2]);
			    $opt_selIn2 = $optName2Arr[0];
			    $opt_priIn2 = $optName2Arr[1];
			    $opt_addIn2 = $opt_nameIn2." : ".$opt_selIn2;
			  }else{
			    $opt_addIn2 = "";
			    $opt_priIn2 = 0;
			    $opt_selIn2 = "";
			  }
			  //옵션추가가격3
			  if($rowS[ReOptTitle3] && $rowS[ReOptCont3]){
			    $opt_nameIn3 = $rowS[ReOptTitle3];
			    $optName3Arr = explode("//",$rowS[ReOptCont3]);
			    $opt_selIn3 = $optName3Arr[0];
			    $opt_priIn3 = $optName3Arr[1];
			    $opt_addIn3 = $opt_nameIn3." : ".$opt_selIn3;
			  }else{
			    $opt_addIn3 = "";
			    $opt_priIn3 = 0;
			    $opt_selIn3 = "";
			  }
			  //옵션추가가격4
			  if($rowS[ReOptTitle4] && $rowS[ReOptCont4]){
			    $opt_nameIn4 = $rowS[ReOptTitle4];
			    $optName4Arr = explode("//",$rowS[ReOptCont4]);
			    $opt_selIn4 = $optName4Arr[0];
			    $opt_priIn4 = $optName4Arr[1];
			    $opt_addIn4 = $opt_nameIn4." : ".$opt_selIn4;
			  }else{
			    $opt_addIn4 = "";
			    $opt_priIn4 = 0;
			    $opt_selIn4 = "";
			  }
			  //옵션추가가격5
			  if($rowS[ReOptTitle5] && $rowS[ReOptCont5]){
			    $opt_nameIn5 = $rowS[ReOptTitle5];
			    $optName5Arr = explode("//",$rowS[ReOptCont5]);
			    $opt_selIn5 = $optName5Arr[0];
			    $opt_priIn5 = $optName5Arr[1];
			    $opt_addIn5 = $opt_nameIn5." : ".$opt_selIn5;
			  }else{
			    $opt_addIn5 = "";
			    $opt_priIn5 = 0;
			    $opt_selIn5 = "";
			  }
			  //옵션추가가격6
			  if($rowS[ReOptTitle6] && $rowS[ReOptCont6]){
			    $opt_nameIn6 = $rowS[ReOptTitle6];
			    $optName6Arr = explode("//",$rowS[ReOptCont6]);
			    $opt_selIn6 = $optName6Arr[0];
			    $opt_priIn6 = $optName6Arr[1];
			    $opt_addIn6 = $opt_nameIn6." : ".$opt_selIn6;
			  }else{
			    $opt_addIn6 = "";
			    $opt_priIn6 = 0;
			    $opt_selIn6 = "";
			  }
			  //옵션추가가격7
			  if($rowS[ReOptTitle7] && $rowS[ReOptCont7]){
			    $opt_nameIn7 = $rowS[ReOptTitle7];
			    $optName7Arr = explode("//",$rowS[ReOptCont7]);
			    $opt_selIn7 = $optName7Arr[0];
			    $opt_priIn7 = $optName7Arr[1];
			    $opt_addIn7 = $opt_nameIn7." : ".$opt_selIn7;
			  }else{
			    $opt_addIn7 = "";
			    $opt_priIn7 = 0;
			    $opt_selIn7 = "";
			  }

			  //옵션가격추가 상품 총가격
			  $goods_priceIn = $rowS[ReGoodsPrice] + $opt_priIn1 + $opt_priIn2 + $opt_priIn3 + $opt_priIn4 + $opt_priIn5 + $opt_priIn6 + $opt_priIn7;

        //상품정보
			  $queryP = "select * from $sangpumTable where ReIdx='$rowS[ReGoodsIdx]'";
			  $rsP = query($queryP,$dbcon);
			  $rowP = mysql_fetch_array($rsP);

			  if($rowP[ReCatKey]=="2"){
			    $mallChk = "Y";
			  }


	  ?>

    <table class="orderJu_table orderJu_mob mbJu50">
      <tbody>
        <tr>
          <td colspan="2"><?if($rowP[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<? echo $rowP[ReFile1] ?>" width=100 alt="" /><?}?></td>
        </tr>
        <tr>
          <th>상품명</th>
          <td>
            <span class="jumun_txt15"><b><?=$rowS[ReGoodsName];?></b></span>
            <span class="jumun_txt14">
            <?if($opt_selIn1){?><br><span><?=$opt_addIn1?></span><?}?>
            <?if($opt_selIn2){?><br><?=$opt_addIn2?><?}?>
            <?if($opt_selIn3){?><br><?=$opt_addIn3?><?}?>
            <?if($opt_selIn4){?><br><?=$opt_addIn4?><?}?>
            <?if($opt_selIn5){?><br><?=$opt_addIn5?><?}?>
            <?if($opt_selIn6){?><br><?=$opt_addIn6?><?}?>
            <?if($opt_selIn7){?><br><?=$opt_addIn7?><?}?>
            </span>
          </td>
        </tr>
        <tr>
          <th>판매가</th>
          <td><?=number_format($goods_priceIn);?>원</td>
        </tr>
        <tr>
          <th>수량</th>
          <td><?=number_format($rowS[ReGoodsCnt]);?>개</td>
        </tr>
        <tr>
          <th>합계</th>
          <td><?=number_format($goods_priceIn*$rowS[ReGoodsCnt]);?>원</td>
        </tr>
      </tbody>
    </table>

    <?
      }
    ?>

    <!-- 모바일상품정보 -->


    <!-- 웹상품정보 -->
    <table class="orderJu_table orderJu_pc mbJu50">
      <thead>
        <tr>
          <th width="150">사진</th>
          <th>상품명</th>
          <th>판매가</th>
          <th>수량</th>
          <th>합계</th>
        </tr>
      </thead>
      <tbody>

        <?
				  $queryS = "select * from $tempTable where (1=1) and ReCartCode='$_SESSION[CARTTEMP]' order by ReIdx asc";
          $rsS = query($queryS,$dbcon);
          $countS = mysql_num_rows($rsS);

				  $total_goods_price=0;  // 총금액
				  $total_goods_point=0;  // 총포인트
				  $total_baesong_price=0; //배송비
				  $baesong_goods_price=0; //배송비추가상품제외

					for($k=0;$k<$countS;$k++){
		        $rowS = mysql_fetch_array($rsS);

					  //옵션추가가격1
  				  if($rowS[ReOptTitle1] && $rowS[ReOptCont1]){
  				    $opt_nameIn1 = $rowS[ReOptTitle1];
  				    $optName1Arr = explode("//",$rowS[ReOptCont1]);
  				    $opt_selIn1 = $optName1Arr[0];
  				    $opt_priIn1 = $optName1Arr[1];
  				    $opt_addIn1 = $opt_nameIn1." : ".$opt_selIn1;
  				  }else{
  				    $opt_addIn1 = "";
  				    $opt_priIn1 = 0;
  				    $opt_selIn1 = "";
  				  }
  				  //옵션추가가격2
  				  if($rowS[ReOptTitle2] && $rowS[ReOptCont2]){
  				    $opt_nameIn2 = $rowS[ReOptTitle2];
  				    $optName2Arr = explode("//",$rowS[ReOptCont2]);
  				    $opt_selIn2 = $optName2Arr[0];
  				    $opt_priIn2 = $optName2Arr[1];
  				    $opt_addIn2 = $opt_nameIn2." : ".$opt_selIn2;
  				  }else{
  				    $opt_addIn2 = "";
  				    $opt_priIn2 = 0;
  				    $opt_selIn2 = "";
  				  }
  				  //옵션추가가격3
  				  if($rowS[ReOptTitle3] && $rowS[ReOptCont3]){
  				    $opt_nameIn3 = $rowS[ReOptTitle3];
  				    $optName3Arr = explode("//",$rowS[ReOptCont3]);
  				    $opt_selIn3 = $optName3Arr[0];
  				    $opt_priIn3 = $optName3Arr[1];
  				    $opt_addIn3 = $opt_nameIn3." : ".$opt_selIn3;
  				  }else{
  				    $opt_addIn3 = "";
  				    $opt_priIn3 = 0;
  				    $opt_selIn3 = "";
  				  }
  				  //옵션추가가격4
  				  if($rowS[ReOptTitle4] && $rowS[ReOptCont4]){
  				    $opt_nameIn4 = $rowS[ReOptTitle4];
  				    $optName4Arr = explode("//",$rowS[ReOptCont4]);
  				    $opt_selIn4 = $optName4Arr[0];
  				    $opt_priIn4 = $optName4Arr[1];
  				    $opt_addIn4 = $opt_nameIn4." : ".$opt_selIn4;
  				  }else{
  				    $opt_addIn4 = "";
  				    $opt_priIn4 = 0;
  				    $opt_selIn4 = "";
  				  }
  				  //옵션추가가격5
  				  if($rowS[ReOptTitle5] && $rowS[ReOptCont5]){
  				    $opt_nameIn5 = $rowS[ReOptTitle5];
  				    $optName5Arr = explode("//",$rowS[ReOptCont5]);
  				    $opt_selIn5 = $optName5Arr[0];
  				    $opt_priIn5 = $optName5Arr[1];
  				    $opt_addIn5 = $opt_nameIn5." : ".$opt_selIn5;
  				  }else{
  				    $opt_addIn5 = "";
  				    $opt_priIn5 = 0;
  				    $opt_selIn5 = "";
  				  }
  				  //옵션추가가격6
  				  if($rowS[ReOptTitle6] && $rowS[ReOptCont6]){
  				    $opt_nameIn6 = $rowS[ReOptTitle6];
  				    $optName6Arr = explode("//",$rowS[ReOptCont6]);
  				    $opt_selIn6 = $optName6Arr[0];
  				    $opt_priIn6 = $optName6Arr[1];
  				    $opt_addIn6 = $opt_nameIn6." : ".$opt_selIn6;
  				  }else{
  				    $opt_addIn6 = "";
  				    $opt_priIn6 = 0;
  				    $opt_selIn6 = "";
  				  }
  				  //옵션추가가격7
  				  if($rowS[ReOptTitle7] && $rowS[ReOptCont7]){
  				    $opt_nameIn7 = $rowS[ReOptTitle7];
  				    $optName7Arr = explode("//",$rowS[ReOptCont7]);
  				    $opt_selIn7 = $optName7Arr[0];
  				    $opt_priIn7 = $optName7Arr[1];
  				    $opt_addIn7 = $opt_nameIn7." : ".$opt_selIn7;
  				  }else{
  				    $opt_addIn7 = "";
  				    $opt_priIn7 = 0;
  				    $opt_selIn7 = "";
  				  }

  				  //옵션가격추가 상품 총가격
  				  $goods_priceIn = $rowS[ReGoodsPrice] + $opt_priIn1 + $opt_priIn2 + $opt_priIn3 + $opt_priIn4 + $opt_priIn5 + $opt_priIn6 + $opt_priIn7;

					  //포인트계산
            if($rowS[ReGoodsPointChk] == "1"){ //상점포인트적용
              $ReGoodsPointIn = round($goods_priceIn*$rowS[ReGoodsCnt]*$rowA[RePointBasic]*0.01);
            }else if($rowS[ReGoodsPointChk] == "2"){ //포인트없음
              $ReGoodsPointIn = 0;
            }else if($rowS[ReGoodsPointChk] == "3"){ //개별포인트적용
              $ReGoodsPointIn = round($goods_priceIn*$rowS[ReGoodsCnt]*$rowS[ReGoodsPoint]*0.01);
            }else{
              $ReGoodsPointIn = 0;
            }

					  // 총금액
					  $total_goods_price+=$goods_priceIn*$rowS[ReGoodsCnt];

					  // 총포인트
					  $total_goods_point+=$ReGoodsPointIn;

            //상품정보
					  $queryP = "select * from $sangpumTable where ReIdx='$rowS[ReGoodsIdx]'";
					  $rsP = query($queryP,$dbcon);
					  $rowP = mysql_fetch_array($rsP);

					  //배송비추가상품 제외
					  $baesongaddChk = $rowP[ReBaeChk];
					  if($baesongaddChk == "1"){
					    $baesong_goods_price += $goods_priceIn * $rowS[ReGoodsCnt];
					  }else{
					    //개별배송비 추가
		          $total_baesong_price += $rowP[ReBaePrice];
		        }

			  ?>

        <tr>
          <td><?if($rowP[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<? echo $rowP[ReFile1] ?>" width="100" height="100" style="border:solid 1px #dddcdc;"><?}?></td>
          <td>
            <span class="jumun_txt15"><b><?=$rowS[ReGoodsName];?></b></span>
            <span class="jumun_txt14">
            <?if($opt_selIn1){?><br><span><?=$opt_addIn1?></span><?}?>
            <?if($opt_selIn2){?><br><?=$opt_addIn2?><?}?>
            <?if($opt_selIn3){?><br><?=$opt_addIn3?><?}?>
            <?if($opt_selIn4){?><br><?=$opt_addIn4?><?}?>
            <?if($opt_selIn5){?><br><?=$opt_addIn5?><?}?>
            <?if($opt_selIn6){?><br><?=$opt_addIn6?><?}?>
            <?if($opt_selIn7){?><br><?=$opt_addIn7?><?}?>
            </span>
          </td>
          <td><?=number_format($goods_priceIn);?>원</td>
          <td><?=number_format($rowS[ReGoodsCnt]);?>개</td>
          <td><?=number_format($goods_priceIn*$rowS[ReGoodsCnt]);?>원</td>
        </tr>

        <?
          }
        ?>

        <? if(!$countS) {?>
        <tr>
          <td height="120" colspan="7" align="center" class="jumun_txt14">구매할 상품이 없습니다.</td>
        </tr>
        <tr>
          <td height="1" bgcolor="#909090" colspan="7"></td>
        </tr>
        <? }?>
        <tr>
          <td height="15"></td>
        </tr>

      </tbody>
    </table>
    <!-- 웹상품정보 -->

    <?
      if($rowA[ReBeaChk] == "1"){ //배송비구분이 완전무료배송이면
        $trade_deliv_price = 0;
      }else{ //일반배송비 기능이면
        if($baesong_goods_price >= $rowA[ReBeaFree]) { //상품합계가 쇼핑몰설정 배송합계보다 클경우
          $trade_deliv_price = 0;
        }	else{
          $trade_deliv_price = $rowA[ReBeaPrice]; //쇼핑몰설정 배송비
        }
      }

      if($baesong_goods_price == 0) $trade_deliv_price=0;	//개별배송비 제외 묶음배송비적용 상품  합계가 0이면 묶음배송비 0

      $add_total_deliv = $trade_deliv_price + $total_baesong_price;

      $Total_goods_deliv_price	 =	$total_goods_price	+	$add_total_deliv; //총상품금액 + 묶음배송비 + 개별배송비
    ?>

    <!-- 주문 정보 끝 -->

    <form class="joinJu_frm" method=post action="jumun_trade.php?CACHE=1" name="trade_form">
    <input type="hidden" name="bae_name" value="<?=$rowT[ReMemName];?>">
    <input type="hidden" name="bae_email" value="<?=$rowT[ReEmail];?>">
    <input type="hidden" name="bae_phone1" value="<?=$RePhoneArr[0];?>">
    <input type="hidden" name="bae_phone2" value="<?=$RePhoneArr[1];?>">
    <input type="hidden" name="bae_phone3" value="<?=$RePhoneArr[2];?>">
    <input type="hidden" name="bae_zip1" value="<?=$rowT[RePost];?>">
    <input type="hidden" name="bae_add1" value="<?=$rowT[ReAddr1];?>">
    <input type="hidden" name="bae_add2" value="<?=$rowT[ReAddr2];?>">
    <input type="hidden" name="ReOrderZip" value="<?=$mb_postChk;?>">
    <input type="hidden" name="ReOrderAdd1" value="<?=$mb_address1Chk;?>">
    <input type="hidden" name="ReOrderAdd2" value="<?=$mb_address2Chk;?>">

    <input type="hidden" name="mallChk" value="<?=$mallChk;?>">

      <p class="ordJu_title">주문자 정보</p>
      <table class="inutJu_info inutJu_join mbJu50">
        <colgroup>
          <col width="10%">
          <col width="45%">
          <col width="15%">
          <col width="30%">
        </colgroup>
        <tbody>
          <tr>
            <th>
              <p>이름</p>
            </th>
            <td colspan="3"><input type="text" name="ReOrderName" value="<?=$mb_nameChk;?>" class="joinJu_mid"></td>
          </tr>
          <tr>
            <th>
              <p>연락처</p>
            </th>
            <td colspan="3">
              <div class="phoneJu_wrap">
                <input type="number" name="ReOrderPhone1" value="<?=$mb_mobileArr[0];?>" class="numberJu_input">
                -
                <input type="number" name="ReOrderPhone2" value="<?=$mb_mobileArr[1];?>" class="numberJu_input">
                -
                <input type="number" name="ReOrderPhone3" value="<?=$mb_mobileArr[2];?>" class="numberJu_input">
              </div>
            </td>
          </tr>
          <tr>
            <th>
              <p>이메일</p>
            </th>
            <td colspan="3">
              <input type="text" name="ReOrderEmail" value="<?=$mb_emailChk;?>" class="joinJu_long fullJu_input">
            </td>
          </tr>

          <?if( !$ss_mb_idChk ) {?>
          <tr>
            <th>
              <p>주문 비밀번호</p>
            </th>
            <td colspan="3">
              <input type="password" name="ReOrderPass" value="" class="joinJu_mid">
            </td>
          </tr>
          <tr>
            <th>
              <p>비밀번호 확인</p>
            </th>
            <td colspan="3">
              <input type="password" name="ReOrderPassChk" value="" class="joinJu_mid">
            </td>
          </tr>
          <?}?>

        </tbody>
      </table>


      <?if($mallChk == "Y"){?>

      <div class="reservJu_wrap orderJu_pc">
        <p class="ordJu_title">배송지 정보</p>
        <span class="delivJu_radio">
          <em><input type="radio" name="order_chk" value="1" id="delv01" onclick="toggleCheck(1);"><label for="delv01">주문자정보와 동일</label></em>
          <?if($ss_mb_idChk){?>
          <em><input type="radio" name="order_chk" value="2" id="delv02" onclick="toggleCheck(2);"><label for="delv02">기본배송지</label></em>
          <?}?>
          <em><input type="radio" name="order_chk" value="0" id="delv03" onclick="toggleCheck(3);"><label for="delv03">새로운 배송지</label></em>
          <?if($ss_mb_idChk){?>
            <a href="javascript:openbaesong();" class="btns6">나의배송지</a>
          <?}?>
        </span>
      </div>

      <div class="reservJu_wrap orderJu_mob">
        <p class="ordJu_title">배송지 정보</p>
        <span class="delivJu_radio">
          <em><input type="radio" name="order_chk" value="1" id="delv01" onclick="toggleCheck(1);"><label for="delv01">주문자정보와 동일</label></em>
          <?if($ss_mb_idChk){?>
          <em><input type="radio" name="order_chk" value="2" id="delv02" onclick="toggleCheck(2);"><label for="delv02">기본배송지</label></em>
          <?}?>
          <p style="padding-bottom:8px;"></p>
          <em><input type="radio" name="order_chk" value="0" id="delv03" onclick="toggleCheck(3);"><label for="delv03">새로운 배송지</label></em>
          <?if($ss_mb_idChk){?>
            <a href="javascript:openbaesong();" class="btns6">나의배송지</a>
          <?}?>
          <p style="padding-bottom:8px;"></p>
        </span>
      </div>

      <table class="inutJu_info inutJu_join mbJu50">
        <colgroup>
          <col width="10%">
          <col width="45%">
          <col width="15%">
          <col width="30%">
        </colgroup>
        <tbody>
          <tr>
            <th>
              <p>이름</p>
            </th>
            <td colspan="3"><input type="text" name="ReDelivName" class="joinJu_mid"></td>
          </tr>

          <? if($_SERVER['HTTPS'] == 'on') { ?>
          <script type="text/javascript" src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
          <? } else { ?>
          <script type="text/javascript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
          <? } ?>

          <script>
            function openDaumPostcode2() {
              new daum.Postcode({
                oncomplete: function(data) {
                  // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
                  // 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.
                  //document.getElementById('zip1').value = data.postcode1;
                  //document.getElementById('zip2').value = data.postcode2;
                  document.getElementById('ReDelivZip').value = data.zonecode; //5자리 새우편번호 사용
                  document.getElementById('ReDelivAdd1').value = data.address;

                  //전체 주소에서 연결 번지 및 ()로 묶여 있는 부가정보를 제거하고자 할 경우,
                  //아래와 같은 정규식을 사용해도 된다. 정규식은 개발자의 목적에 맞게 수정해서 사용 가능하다.
                  //var addr = data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
                  //document.getElementById('addr').value = addr;

                  document.getElementById('ReDelivAdd2').focus();
                }
              }).open();
            }
          </script>

          <tr>
            <th>
              <p>주소</p>
            </th>
            <td colspan="3">
              <p class="mbJu10"><input type="number" name="ReDelivZip" id="ReDelivZip" class="idJu_sell" readonly><a class="joiningJu_btn" href="javascript:openDaumPostcode2();">우편번호 검색</a></p>
              <p class="mbJu10"><input type="text" name="ReDelivAdd1" id="ReDelivAdd1" class="joinJu_long fullJu_input"></p>
              <p class="mbJu10"><input type="text" name="ReDelivAdd2" id="ReDelivAdd2" class="joinJu_long fullJu_input" placeholder="나머지주소"></p>
            </td>
          </tr>
          <tr>
            <th>
              <p>연락처</p>
            </th>
            <td colspan="3">
              <div class="phoneJu_wrap">
                <input type="number" name="ReDelivPhone1" class="numberJu_input">
                -
                <input type="number" name="ReDelivPhone2" class="numberJu_input">
                -
                <input type="number" name="ReDelivPhone3" class="numberJu_input">
              </div>
            </td>
          </tr>
          <tr>
            <th>
              <p>이메일</p>
            </th>
            <td colspan="3">
              <input type="text" name="ReDelivEmail" class="joinJu_long fullJu_input">
            </td>
          </tr>

          <tr>
            <th>배송시 요청사항</th>
            <td colspan="3">
              <select name="ReDelivSelect" style="width:350px;" class="selectA" onChange="delevetcfnc(this.value);">
                <option value="">배송시 요청사항을 선택하세요 (선택사항)</option>
                <option value="1">배송전, 연락바랍니다.</option>
                <option value="2">부재시, 전화 또는 문자 주세요.</option>
                <option value="3">부재시, 경비실에 맡겨주세요.</option>
                <option value="4">직접입력</option>
              </select>
              <span id="deliv_etc" style="display:none;"><p style="padding-top:5px;"><input type="text" name="ReDelivAsk" class="joinJu_long fullJu_input"></p></span>
            </td>
          </tr>
        </tbody>
      </table>

      <?}?>


      <p class="ordJu_title">결제정보</p>
      <table class="inutJu_info inutJu_join mbJu50">
        <colgroup>
          <col width="10%">
          <col width="45%">
          <col width="15%">
          <col width="30%">
        </colgroup>
        <tbody>
          <tr>
            <th>
              <p>총상품가격</p>
            </th>
            <td colspan="3"><?=number_format($total_goods_price);?>원</td>
          </tr>
          <tr>
            <th>
              <p>묶음배송비</p>
            </th>
            <td colspan="3"><?=number_format($trade_deliv_price);?>원</td>
          </tr>

          <?if($total_baesong_price > 0){?>
          <tr>
            <th>
              <p>개별배송비</p>
            </th>
            <td colspan="3"><?=number_format($total_baesong_price);?>원</td>
          </tr>
          <?}?>

          <!-- 회원일 경우만 포인트사용 노출 -->
          <? if($_SESSION['ss_mb_id']) {?>
          <tr>
            <th>
              <p>사용포인트</p>
            </th>
            <td colspan="3">
              <span id="usepointcur">0</span>원 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              보유 : <?=number_format($RePointTotal)?>원&nbsp;&nbsp;&nbsp;
              <a href="javascript:pointUseGo('<?=$RePointTotal?>','<?=$rowA[RePointLimit]?>');" class="btns5">포인트사용</a>

              <p style="padding-top:14px;bgcolor:#f1f1f1;display:none;" id="baeViewIn"><input name="RePointChk" type="text" class="inputA" style="width:100px;" value="0" onkeydown="return onlyNumber(event)" onkeyup="removeChar(event)"> 원 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:pointApplyGo();" class="btns1">포인트적용</a></p>

            </td>
          </tr>
          <?}?>

          <tr>
            <th>
              <p>총결제금액</p>
            </th>
            <td colspan="3">
              <span style="color:#ae0000;"><span id="totalpricecur"><?=number_format($Total_goods_deliv_price);?></span>원</span>
            </td>
          </tr>

          <input type="hidden" name="ReTradePrice" value="<?=$total_goods_price?>">
          <input type="hidden" name="ReDelivPrice" value="<?=$trade_deliv_price?>">
          <input type="hidden" name="RePriceTotal" value="<?=$Total_goods_deliv_price?>">
          <input type="hidden" name="RePriceTotalOrg" value="<?=$Total_goods_deliv_price?>">

          <input type="hidden" name="RePointUse" value="0">
          <input type="hidden" name="RePointSave" value="<?=$total_goods_point;?>">
          <input type="hidden" name="RePointSaveOrg" value="<?=$total_goods_point;?>">
          <input type="hidden" name="RePointMy" value="<?=$RePointTotal;?>">

          <tr>
            <th>
              <p>결제방법</p>
            </th>
            <td colspan="3" style="line-height:28px;">
              <input type="radio" id="trade01" name="ReTradeMethod" value="1" onClick="tradeCheck(1);" checked> <label for="trade01">카드결제</label>  &nbsp;&nbsp;&nbsp;
              <input type="radio" id="trade02" name="ReTradeMethod" value="2" onClick="tradeCheck(2);" > <label for="trade02">계좌이체</label> &nbsp;&nbsp;&nbsp;
              <input type="radio" id="trade03" name="ReTradeMethod" value="3" onClick="tradeCheck(3);" > <label for="trade03">무통장입금</label> &nbsp;&nbsp;&nbsp;
              <span style="display:none;"><input type="radio" id="trade04" name="ReTradeMethod" value="4" onClick="tradeCheck(4);" > <label for="trade04">핸드폰결제</label> &nbsp;&nbsp;&nbsp;-->

              <? if($_SESSION['ss_mb_id']) {?>
              <span style="display:none;"><input type="radio" name="ReTradeMethod" value="5" onClick="tradeCheck(5);"> 전액포인트 &nbsp;&nbsp;&nbsp;</span>
              <?}?>
            </td>
          </tr>

          <tr id="methodView1" style="display:none;">
            <th>
              <p>입금은행</p>
            </th>
            <td colspan="3">
              <?
                $ReBankTitleArr = explode("|",$rowA[ReBankTitle]); //입금은행이름배열값
                $ReBankCodeArr = explode("|",$rowA[ReBankCode]); //입금은행계좌번호배열값
                $ReBankNameArr = explode("|",$rowA[ReBankName]); //입금은행입금자명배열값
              ?>
              <select name="ReTradeBank" class="selectA" style="width:300px">
                <?
                  for($k=0;$k<count($ReBankTitleArr);$k++){
                    if($ReBankTitleArr[$k]){
                      $bank_info = $ReBankTitleArr[$k]." ".$ReBankCodeArr[$k]." (".$ReBankNameArr[$k].")";
                ?>
                <option value="<?=$bank_info;?>"><?=$bank_info;?></option>
                <?
                    }
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr id="methodView2" style="display:none;">
            <th>
              <p>입금예정일</p>
            </th>
            <td colspan="3">
              <select name="ReBankDate1" class="selectA">
                <?for($y=date('Y');$y<date('Y')+1;$y++){?>
                <option value="<?=$y?>" <? if($y==date('Y')){ echo "Selected"; } ?>><?=$y?></option>
                <?}?>
              </select> 년

              <select name="ReBankDate2" class="selectA">
                <?for($m=1;$m<12;$m++){?>
                <option value="<?=$m?>" <? if($m==date('m')){ echo "Selected"; } ?>><?=$m?></option>
                <?}?>
              </select> 월

              <select name="ReBankDate3" class="selectA">
                <?for($d=1;$d<32;$d++){?>
                <option value="<?=$d?>" <? if($d==date('d')){ echo "Selected"; } ?>><?=$d?></option>
                <?}?>
              </select> 일 &nbsp; &nbsp;
            </td>
          </tr>
          <tr id="methodView3" style="display:none;">
            <th>
              <p>입금자명</p>
            </th>
            <td colspan="3"><input type="text" name="ReBankEnterName" value="<?=$mb_nameChk;?>" class="joinJu_mid"></td>
          </tr>
          <tr id="methodView4" style="display:none;">
            <th>
              <p>현금영수증</p>
            </th>
            <td colspan="3">
              <input type="checkbox" value="Y" name="ReYoungsuYes" id="ReYoungsuYes" onClick="youngCheck();"> 현금영수증발급을 원하시면 체크해주세요
            </td>
          </tr>
          <tr id="young_view" style="display:none;">
            <th>
              <p>발급정보</p>
            </th>
            <td colspan="3">
              <select name="ReYoungsuSel" class="selectA">
                <option value="1" selected>휴대폰번호</option>
                <option value="2">현금영수증카드</option>
              </select>
              <input type="text" class="joinJu_mid" name="ReYoungsuNum">
            </td>
          </tr>

        </tbody>
      </table>

      <!-- 비회원일경우 개인정보동의 추가 -->
      <?if( !$ss_mb_idChk ) {?>
      <div class="termsJu_wrap">
        <p>개인정보취급방침</p>
        <article class="termsJu_box">
          <?=nl2br($rowC[ad_private])?>
        </article>
      </div>
      <p class="agreeJu_wrap">
        <span class="checkJu_box">
          <input type="checkbox" name="agree_check" id="agree_check" value="1">
          <label for="agree_check"></label>
        </span>
        <span>
          <label for="agree_check">개인정보보호정책에 동의</label>
        </span>
      </p>
      <p class="infinpJu_wran">※ 타인의 명의, 회사명 도용 및 항목들에 대해 기재시 정보 보호를 위해 서비스 시용이 제한됩니다.</p>
      <?}?>

      <ul class="submitJu_btns">
        <li class="submitJu"><a href="javascript:actionGo();">다음단계</a> </li>
        <li class="cancleJu"><a href="javascript:history.back(-1);">취소하기</a> </li>
      </ul>
    </form>
  </section>
  <!--  -->
</div>
<!-- 서브 내용 끝 -->







<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopBottom.php"; ?>

