<?
  $site_path = '../HyAdmin/';
  require_once($site_path."include/lib.inc.php");
  require_once($site_path."lib/common.php"); //쇼핑몰추가
  
  $cartTable = "hy_cartwish"; //장바구니 테이블
  $shopcfgTable = "hy_shop_cfg"; //쇼핑몰성정 테이블
  $memberTable = "hy_member"; //회원 테이블
  $sangpumTable = "hy_sangpum"; //상품 테이블
  
  //쇼핑몰설정정보
  $queryA = "select * from $shopcfgTable order by ReIdx asc limit 1";
  $rsA = query($queryA,$dbcon);
	$rowA = mysql_fetch_array($rsA);
  
  //회원정보	
	$ss_mb_idChk = $_SESSION['ss_mb_id']; //회원아이디
	
	if($ss_mb_idChk){ //회원이라면
		$queryM = "select * from $memberTable where mb_id='$ss_mb_idChk'";
		$rsM = query($queryM,$dbcon);
		$rowM = mysql_fetch_array($rsM);
		$mb_numChk = $rowM[mb_num];
		$mb_idChk = $rowM[mb_id];
		$mb_nameChk = $rowM[mb_name];
		
		//로그인안한상태에서 장바구니에 담았던 상품 로그인시 회원 장바구니 등록
		$queryX = "update $cartTable set ReMemKey = '$mb_numChk', ReMemId = '$mb_idChk', ReMemName = '$mb_nameChk' where ReCartCode='$_SESSION[CART]' and ReMemKey = '0'";
		query($queryX,$dbcon);
		
		$cartWh = "and ReMemKey='$mb_numChk'";
	}else{
	  $cartWh = "and ReCartCode='$_SESSION[CART]'";
	}
	
  if($cart_method==2) { //장바구니 상품갯수 수정
		
		// 현재 상품수량 체크
		$queryW = "select * from $sangpumTable where ReIdx='$goods_edit_idx'";
    $rsW = query($queryW,$dbcon);
	  $rowW = mysql_fetch_array($rsW);
		
		if(!$rowW[ReUnlimit] && ($rowW[ReNumber] < $edit_goods_cnt)){
			hy_href("","상품 보유량이 부족합니다.");
		} else {
			$queryU = "update $cartTable set ReGoodsCnt='$edit_goods_cnt' where ReIdx='$cart_edit_idx'";
			query($queryU,$dbcon);
		}

	} else if($cart_method==3) { //장바구니 상품 삭제
	  
	  $queryD = "delete from $cartTable where ReIdx='$cart_edit_idx'";
		query($queryD,$dbcon);
	  
  }
  
?>


<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopTop01.php"; ?>

<link href="/shop/css/shopcss.css" rel="stylesheet" type="text/css">



<!-- 네이버페이 추가 -->
<?if($ss_mb_idChk == "navertest"){?>

<script type="text/javascript" src="http://pay.naver.com/customer/js/naverPayButton.js" charset="UTF-8"></script>
<script type="text/javascript" >
//<![CDATA[

function checkOption(selectBox, nonSelectedIndex, optionName){
  if (selectBox.selectedIndex == nonSelectedIndex) {
    alert("상품 옵션을 선택해 주세요. (" + optionName + ")");
    return false;
  }
  return true;
}

function checkShippingPrice(radio){
  var len = radio.length;
  if (len == undefined) {
    if (radio.checked) {
      return true;
    }
  } else {
    for(var i = 0; i < len; i++) {
      if(radio[i].checked) {
        return true;
      }
    }
  }
  alert("배송비를 선택해 주세요.");
  return false;
}

function buy_nc(url){
 
    var form=document.fitem;
    
    form.action="product_cart_xml.php";
		form.submit();
 
}

function cart_nc(url){
  
    var form=document.fitem;
    
    form.action="order_once_naver.php?trade_method=2&goods_data=<?=$goods_data;?>";
		form.submit();
		
}

function wishlist_nc(url){
  // 네이버 페이로 찜 정보를 등록하는 가맹점 페이지 팝업 창 생성.
  // 해당 페이지에서 찜 정보 등록 후 네이버 페이 찜 페이지로 이동.
  
  url = "http://xxx.co.kr/shop/naverwish.php?wishlist_method=1&goods_data=<?=$goods_data;?>";
  
  window.open(url,"","scrollbars=yes,width=400,height=267");
  return false;
}

function not_buy_nc(){
  alert("네이버페이로 구매할 수 없는 상품입니다.");
  return false;
}
//]]>
</script>

<?}?>
<!-- 네이버페이 추가 -->


<script language="JavaScript">
<!--
//수량변경
function cartEdit(f, cartIdx, goodsIdx) {
	if(f.edit_goods_cnt.value=="" ||f.edit_goods_cnt.value=="0" ||f.edit_goods_cnt.value==0 ) {
		alert("수량을 입력해 주십시오.");
		f.edit_goods_cnt.focus();
	} else {	
		location.href="<?=$_SERVER[PHP_SELF];?>?cart_method=2&cart_edit_idx="+cartIdx+"&edit_goods_cnt="+f.edit_goods_cnt.value+"&goods_edit_idx="+goodsIdx;
	}
}

//수량변경(모바일)
function cartEditM(f, cartIdx, goodsIdx) {
	if(f.edit_goods_cnt.value=="" ||f.edit_goods_cnt.value=="0" ||f.edit_goods_cnt.value==0 ) {
		alert("수량을 입력해 주십시오.");
		f.edit_goods_cnt.focus();
	} else {	
		location.href="<?=$_SERVER[PHP_SELF];?>?cart_method=2&cart_edit_idx="+cartIdx+"&edit_goods_cnt="+f.edit_goods_cnt.value+"&goods_edit_idx="+goodsIdx;
	}
}
//-->
</script>


<script type="text/javascript">
<!--
  function jqCheckAll( id, name ) 
  { 
  	$("INPUT[@name=" + name + "][type='checkbox']").attr('checked', $('#' + id).is(':checked')); 
  	cartallin();
  } 
-->
</script>

<script type="text/javascript"> 
    function AllChkList() { 
      var Objs = document.getElementsByName("check[]") 
      if (!Objs) { return; } 
      if (Objs.length > 0) { 
          for (i = 0; i < Objs.length; i++) { Objs[i].checked = !Objs[i].checked; } 
      } 
      else { Objs.checked = !Objs.checked; } 
        
      cartallin();  
    } 
</script> 


<script language="JavaScript">
<!--
  //콤마찍기
  function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
  }

  //장바구니 상품구매
  function cartOrder(form){
    
    var Objs = document.getElementsByName("check[]") 
    if (!Objs) { return; } 
    
    var count=0;
    for(var i=0; i<Objs.length; i++) 
    { 
      if(Objs[i].checked == true) 
      { 
        count++; 
      } 
    } 
	
    if ( count == 0 ) 
    { 
      alert('주문할상품을 체크해주세요.'); 
      return; 
    } else {
      ans = confirm("\n체크한 상품을 주문 하시겠습니까?");
      if(ans==true){
        frmAll.action = "cart_temp_ok.php";
        frmAll.submit();
      }
    }
  }
  
  //장바구니 상품구매(모바일)
  function cartOrderM(form){
    
    var Objs = document.getElementsByName("checkM[]") 
    if (!Objs) { return; } 
    
    var count=0;
    for(var i=0; i<Objs.length; i++) 
    { 
      if(Objs[i].checked == true) 
      { 
        count++; 
      } 
    } 
	
    if ( count == 0 ) 
    { 
      alert('주문할상품을 체크해주세요.'); 
      return; 
    } else {
      ans = confirm("\n체크한 상품을 주문 하시겠습니까?");
      if(ans==true){
        frmAll.action = "cart_temp_ok.php";
        frmAll.submit();
      }
    }
  }
  
  //체크상품 배열값 만들기
  function cartallin(){
    
    var ReBeaFreeIn = Number(frmAll.ReBeaFreeChk.value);
    var ReBeaPriceChkIn = Number(frmAll.ReBeaPriceChk.value);
    
    var Objs = document.getElementsByName("check[]"); //상품체크박스
    var pricego = document.getElementsByName("pricein[]"); //상품가격
    var goodcntgo = document.getElementsByName("goodcntin[]"); //구입갯수
    
    if (!Objs) { return; } 
    
    var chknumins = ""; //상품번호 배열값
    var chkpriceins = 0; //체크한상품 가격합
    for(var i=0; i<Objs.length; i++) 
    { 
      if(Objs[i].checked == true) 
      { 
        chknumins = chknumins + "|" + Objs[i].value;
        
        chkpriceins = Number(chkpriceins) + (Number(pricego[i].value) * Number(goodcntgo[i].value));
        
        
      } 
    }
    
    chkpriceinsIn = Number(chkpriceins); //상품구매금액
    document.getElementById ( "pricewon" ).innerHTML = comma(chkpriceinsIn); //상품구매금액 적용
    
    //배송비책정
    if(chkpriceinsIn >= ReBeaFreeIn) { //상품합계가 쇼핑몰설정 배송합계보다 클경우
			delivpricein = 0;	
		}	else if(chkpriceinsIn == 0){ //상품합계가 0일경우
			delivpricein = 0;
		}else{ //쇼핑몰 배송비 설정
			delivpricein = ReBeaPriceChkIn; //쇼핑몰설정 배송비
		}
		
		document.getElementById ( "beasongin" ).innerHTML = comma(delivpricein); //배송비 적용
    
    chkpriceinshap = Number(chkpriceinsIn) + Number(delivpricein); //총결제금액계산
    
    document.getElementById ( "pricehap" ).innerHTML = comma(chkpriceinshap); //총 결제금액 적용
    
    frmAll.chknumarr.value = chknumins; //상품번호 배열값 적용
    
  }
  
  //체크상품 배열값 만들기(모바일)
  function cartallinM(){
    
    var ReBeaFreeIn = Number(frmAll.ReBeaFreeChk.value);
    var ReBeaPriceChkIn = Number(frmAll.ReBeaPriceChk.value);
    
    var Objs = document.getElementsByName("checkM[]"); //상품체크박스
    var pricego = document.getElementsByName("priceinM[]"); //상품가격
    var goodcntgo = document.getElementsByName("goodcntinM[]"); //구입갯수
    
    if (!Objs) { return; } 
    
    var chknumins = ""; //상품번호 배열값
    var chkpriceins = 0; //체크한상품 가격합
    for(var i=0; i<Objs.length; i++) 
    { 
      if(Objs[i].checked == true) 
      { 
        chknumins = chknumins + "|" + Objs[i].value;
        
        chkpriceins = Number(chkpriceins) + (Number(pricego[i].value) * Number(goodcntgo[i].value));
        
        
      } 
    }
    
    chkpriceinsIn = Number(chkpriceins); //상품구매금액
    document.getElementById ( "pricewon" ).innerHTML = comma(chkpriceinsIn); //상품구매금액 적용
    
    //배송비책정
    if(chkpriceinsIn >= ReBeaFreeIn) { //상품합계가 쇼핑몰설정 배송합계보다 클경우
			delivpricein = 0;	
		}	else if(chkpriceinsIn == 0){ //상품합계가 0일경우
			delivpricein = 0;
		}else{ //쇼핑몰 배송비 설정
			delivpricein = ReBeaPriceChkIn; //쇼핑몰설정 배송비
		}
		
		document.getElementById ( "beasongin" ).innerHTML = comma(delivpricein); //배송비 적용
    
    chkpriceinshap = Number(chkpriceinsIn) + Number(delivpricein); //총결제금액계산
    
    document.getElementById ( "pricehap" ).innerHTML = comma(chkpriceinshap); //총 결제금액 적용
    
    frmAll.chknumarr.value = chknumins; //상품번호 배열값 적용
    
  }
  
// -->
</script>

<form name="frmAll" method="post">
  <input type="hidden" name="chknumarr" value="" style="width:300px;">
  <input type="hidden" name="ReBeaFreeChk" value="<?=$rowA[ReBeaFree]?>" style="width:300px;">
  <input type="hidden" name="ReBeaPriceChk" value="<?=$rowA[ReBeaPrice]?>" style="width:300px;">
</form>



<!-- 서브 내용 -->
<div class="subJu_contents">
  <!-- -->
  <section class="centerJu_box">
    <!--p class="secJu_title"><span>VUOKKOSET</span> 주문하기</p-->
    <!-- 주문 정보 -->
    
    
    <?
		  $formM_cnt = 0;
		  
		  //장바구니 불러오기  
      $queryS = "select * from $cartTable where (1=1) $cartWh order by ReIdx asc";
      $rsS = query($queryS,$dbcon);
      $countS = mysql_num_rows($rsS);
    		  
		  for($k=0;$k<$countS;$k++){
		    $rowS = mysql_fetch_array($rsS);
		  
			  $formM_cnt++;
			  
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
			  
        //상품가격
        $shop_priceIn = $rowS[ReGoodsPrice];
        
			  //옵션추가가격
			  $goods_priceIn = $shop_priceIn + $opt_priIn1 + $opt_priIn2 + $opt_priIn3 + $opt_priIn4 + $opt_priIn5 + $opt_priIn6 + $opt_priIn7;
			  
			  // 따음표나 공백 복원
			  $goods_name=stripslashes($rowS[ReGoodsName]);
			 
        //상품정보
			  $queryP = "select * from $sangpumTable where ReIdx='$rowS[ReGoodsIdx]'";
			  $rsP = query($queryP,$dbcon);
			  $rowP = mysql_fetch_array($rsP);

			  if($rowP[ReUnlimit]==0 && $rowP[ReNumber]==0) $unlimitChk = "Y";
			  
			  if($rowP[ReShopPrice] == 0) $priceChk = "Y";
			  
		?>
		
    <form name="formM_<?=$formM_cnt;?>">
		<input type=hidden value="<? echo $goods_priceIn ?>" name="priceinM[]" id="priceinM[]">
		<input type=hidden value="<? echo $rowS[ReGoodsCnt] ?>" name="goodcntinM[]" id="goodcntinM[]">
    <table class="orderJu_table orderJu_mob mbJu50">
      <tbody>
        <tr>
          <th>선택</th>
          <td><input type=checkbox value="<? echo $rowS[ReIdx] ?>" name="checkM[]" id="checkM[]" onClick="cartallinM();"></td>
        </tr>
        <tr>
          <td colspan="2"><?if($rowP[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<?=$rowP[ReFile1]?>" width="100" height="100" style="border:solid 1px #dddcdc;"><?}?></td>
        </tr>
        <tr>
          <th>상품명</th>
          <td>
            <span class="jumun_txt15"><b><?=$goods_name;?></b></span>
					  <span class="jumun_txt14">
					  <?if($opt_selIn1){?><br><?=$opt_addIn1?><?}?>
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
          <td>
            <table class="orderJu_tableMun" border="0" cellspacing="0" cellpadding="0">
  						<tr>
  						  <td>
  						    <input name="edit_goods_cnt" type="text" class="inputB" style="width:50px;text-align:center" value="<?=$rowS[ReGoodsCnt];?>" onKeyPress="if( (event.keyCode<48) || (event.keyCode>57) ) event.returnValue=false;">
  						    <a href="javascript:cartEditM(document.formM_<?=$formM_cnt;?>, <?=$rowS[ReIdx];?>, <?=$rowS[ReGoodsIdx];?>);" onfocus="this.blur()" class="btns6">수량변경</a>
  						  </td>
  						</tr>
					  </table>
          </td>
        </tr>
        <tr>
          <th>합계</th>
          <td><?=number_format($goods_priceIn*$rowS[ReGoodsCnt]);?>원</td>
        </tr>
        <tr>
          <th>삭제</th>
          <td><a href="<?=$_SERVER[PHP_SELF];?>?cart_method=3&cart_edit_idx=<?=$rowS[ReIdx];?>" onfocus="this.blur()" class="btns5">삭제</a></td>
        </tr>
      </tbody>
    </table>
    </form>
    
    <?}?>
    
    <? if(!$countS) {?>
  	<table class="orderJu_table orderJu_mob mbJu50">  
  	  <tr>
        <td height="120" colspan="7" align="center" class="jumun_txt14" style="text-align:center;border-bottom:solid 1px #dddcdc;">장바구니에 담겨진 상품이 없습니다.</td>
      </tr>
    </table>
	  <?}?>
	  
	  
    <table class="orderJu_table orderJu_pc mbJu50">
      <thead>
        <tr>
          <th width="20"><input type="checkbox" name="checkAll" id="checkAll" onclick="javascript:AllChkList();" class="ckbox" /></th>
          <th width="150">사진</th>
          <th>상품명</th>
          <th>판매가</th>
          <th>수량</th>
          <th>합계</th>
          <th>삭제</th>
        </tr>
      </thead>
      <tbody>
        
        <?
				  $total_goods_price = 0;  // 총금액
				  $total_goods_point = 0;  // 총포인트
				  $form_cnt = 0;
				  
				  //장바구니 불러오기  
          $queryS = "select * from $cartTable where (1=1) $cartWh order by ReIdx asc";
          $rsS = query($queryS,$dbcon);
          $countS = mysql_num_rows($rsS);
    				  
				  for($k=0;$k<$countS;$k++){
				    $rowS = mysql_fetch_array($rsS);
				  
					  $form_cnt++;
					  
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
  				  
            //상품가격
            $shop_priceIn = $rowS[ReGoodsPrice];
            
  				  //옵션추가가격
  				  $goods_priceIn = $shop_priceIn + $opt_priIn1 + $opt_priIn2 + $opt_priIn3 + $opt_priIn4 + $opt_priIn5 + $opt_priIn6 + $opt_priIn7;
					  
					  // 총금액
					  $total_goods_price+=$goods_priceIn*$rowS[ReGoodsCnt];
					  // 총포인트
					  $total_goods_point+=$goods_priceIn*$rowS[ReGoodsCnt]*$rowS[ReGoodsPoint]*0.01;
					  // 따음표나 공백 복원
					  $goods_name=stripslashes($rowS[ReGoodsName]);
					 
            //상품정보
					  $queryP = "select * from $sangpumTable where ReIdx='$rowS[ReGoodsIdx]'";
					  $rsP = query($queryP,$dbcon);
					  $rowP = mysql_fetch_array($rsP);

  				  if($rowP[ReUnlimit]==0 && $rowP[ReNumber]==0) $unlimitChk = "Y";
  				  
  				  if($rowP[ReShopPrice] == 0) $priceChk = "Y";
					  
				?>
        
        <form name="form_<?=$form_cnt;?>">
				<input type=hidden value="<? echo $goods_priceIn ?>" name="pricein[]" id="pricein[]">
				<input type=hidden value="<? echo $rowS[ReGoodsCnt] ?>" name="goodcntin[]" id="goodcntin[]">
        <tr>
          <td><input type=checkbox value="<? echo $rowS[ReIdx] ?>" name="check[]" id="check[]" onClick="cartallin();"></td>
          <td><?if($rowP[ReFile1]){?><img src="/HyAdmin/upload/goodFile/<?=$rowP[ReFile1]?>" width="100" height="100" style="border:solid 1px #dddcdc;"><?}?></td>
          <td>
            <span class="jumun_txt15"><b><?=$goods_name;?></b></span>
					  <span class="jumun_txt14">
					  <?if($opt_selIn1){?><br><?=$opt_addIn1?><?}?>
					  <?if($opt_selIn2){?><br><?=$opt_addIn2?><?}?>
					  <?if($opt_selIn3){?><br><?=$opt_addIn3?><?}?>
					  <?if($opt_selIn4){?><br><?=$opt_addIn4?><?}?>
					  <?if($opt_selIn5){?><br><?=$opt_addIn5?><?}?>
					  <?if($opt_selIn6){?><br><?=$opt_addIn6?><?}?>
					  <?if($opt_selIn7){?><br><?=$opt_addIn7?><?}?>
					  </span>
          </td>
          <td><?=number_format($goods_priceIn);?>원</td>
          <td>
            <table class="orderJu_tableMun" border="0" cellspacing="0" cellpadding="0">
  						<tr>
  						  <td>
  						    <input name="edit_goods_cnt" type="text" class="inputB" style="width:50px;text-align:center" value="<?=$rowS[ReGoodsCnt];?>" onKeyPress="if( (event.keyCode<48) || (event.keyCode>57) ) event.returnValue=false;">
  						    <a href="javascript:cartEdit(document.form_<?=$form_cnt;?>, <?=$rowS[ReIdx];?>, <?=$rowS[ReGoodsIdx];?>);" onfocus="this.blur()" class="btns6">수량변경</a>
  						  </td>
  						</tr>
					  </table>
          </td>
          <td><?=number_format($goods_priceIn*$rowS[ReGoodsCnt]);?>원</td>
          <td><a href="<?=$_SERVER[PHP_SELF];?>?cart_method=3&cart_edit_idx=<?=$rowS[ReIdx];?>" onfocus="this.blur()" class="btns5">삭제</a></td>
        </tr>
        </form>
        
        <?}?>
        
        <? if(!$countS) {?>
			  <tr>
          <td height="120" colspan="7" align="center" class="jumun_txt14">장바구니에 담겨진 상품이 없습니다.</td>
        </tr>
			  <?}?>
        
      </tbody>
    </table>
    
    <?
  		if($total_goods_price >= $rowA[ReBeaFree]) { //상품합계가 쇼핑몰설정 배송합계보다 클경우
  			$trade_deliv_price=0;	
  			
  		}	else if(!$total_goods_price){ //상품합계가 0일경우
  			
  			$trade_deliv_price=0;
  			
  		}else{ //쇼핑몰 배송비 설정
  			
  			$admin_express_money = $rowA[ReBeaPrice]; //쇼핑몰설정 배송비
  			$trade_deliv_price = $admin_express_money;
  			
  		}
  
  		$Total_goods_deliv_price	 =	$total_goods_price + $trade_deliv_price; //배송비 합산 총 결제금액
  		
    ?>
    
    <!--table width="100%" border="0" cellspacing="0" cellpadding="0" class="borderClas">
      <tr>
        <td height="30" align="right" bgcolor="#f4f4f4" style="padding:6px;" class="jumun_txt14">상품구매금액 : <span id="pricewon">0</span>원 + 묶음배송비 : <span id="beasongin">0</span>원</td>
      </tr>
      <tr>
        <td height="1" align="right" bgcolor="#cccccc"></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#f4f4f4" style="padding:6px;" class="jumun_txt15">총 결제금액 : <span id="pricehap">0</span>원</td>
      </tr>
      <tr>
        <td height="40"></td>
      </tr>
    </table-->

    <!-- 주문 정보 끝 -->

  
    <!-- 결제금액 -->
    <article class="priceCar_total">
      <dl>
        <dt>상품금액</dt>
        <dd><span id="pricewon">0</span>원</dd>
      </dl>
      
      <span class="stringCar">+</span>
      <dl>
        <dt>묶음배송비</dt>
        <dd><span id="beasongin">0</span>원</dd>
      </dl>
      <span class="stringCar ecoleCar">=</span>
      <dl class="totalCar_dl">
        <dt>결제금액</dt>
        <dd class="thisCar_total"><span id="pricehap">0</span>원</dd>
      </dl>
    </article>
    <!-- 결제금액 끝 -->
  
  
  
    <ul class="submitJu_btns orderJu_pc">
      <li class="submitJu"><a href="javascript:cartOrder();">주문하기</a> </li>
      <li class="cancleJu"><a href="/">메인가기</a> </li>
    </ul>
    
    <ul class="submitJu_btns orderJu_mob">
      <li class="submitJu"><a href="javascript:cartOrderM();">주문하기</a> </li>
      <li class="cancleJu"><a href="/">메인가기</a> </li>
    </ul>
    
  </section>
  <!--  -->
</div>
<!-- 서브 내용 끝 -->



<? include $_SERVER["DOCUMENT_ROOT"]."/inc/subShopBottom.php"; ?>
