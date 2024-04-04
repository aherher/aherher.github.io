    <?
      $baseurl = basename($_SERVER['PHP_SELF']);
      $queryC = "select * from hy_votecomm where ReCatKey = '$ReIdx' order by ReIdx desc";
      $rsC = query($queryC,$dbcon);
      $countC = mysql_num_rows($rsC);
    ?>
    
    <script>
      function actionComm(){
        if(frmC.ReCommText.value == ""){
          alert("댓글을 입력해주세요");
          return;
        }
        frmC.submit();        
      }
      
      function singo(str1){
        if(confirm("신고하시겠습니까?")){
          location.href = "peolples_comm_sin.php?urlGo=<?=$baseurl?>&ReIdxIn=<?=$ReIdx?>&ReIdx=" + str1;
        }
      }
    </script>
    
    
    
    <!-- 댓글 -->
    <section class="commentsWrap">
      <p class="total">댓글 <?=$countC?></p>
      <form class="writing flex_center" method="post" name="frmC" action="peolples_comm_ps.php">
      <input type="hidden" name="ReIdxIn" value="<?=$ReIdx?>">
      <input type="hidden" name="urlGo" value="<?=$baseurl?>">
        <input type="text" name="ReCommText" <?if(!$ss_mb_id){?>placeholder="로그인 해주세요." onClick="loginChk();"<?}else{?>placeholder="댓글을 입력 해주세요."<?}?>>
        <?if(!$ss_mb_id){?>
        <a href="javascript:loginChk();" class="submitWrite">등록</a>
        <?}else{?>
        <a href="javascript:actionComm();" class="submitWrite">등록</a>
        <?}?>
      </form>
      
      
      <?
        $form_name=0; // 폼리스트 변수
        for($k=0;$k<$countC;$k++){
          $rowC = mysql_fetch_array($rsC);
          $form_name++; // 폼네임변경 숫자증가
          
          $ReInDateArr = explode("-",$rowC[ReInDate]);
      ?>
      
      <!-- -->
      <div class="commentsLists">
        <div class="commented flex_start">
          <article class="theComments">
            <p class="writer"><?=$rowC[ReMemName]?></p>
            <p class="writered"><?=$rowC[ReContent]?> </p>
            <p class="date"><?=$ReInDateArr[0]?>. <?=$ReInDateArr[1]?>. <?=$ReInDateArr[2]?> </p>
          </article>
          <div class="inBtns">
            <ul class="thisBtns">
              <?if($ss_mb_id){?><li class="warn"><a href="javascript:singo('<?=$rowC[ReIdx]?>');">신고</a></li><?}?>
              <?if($rowC[ReMemKey]==$rowM[mb_num]){?><li class="edit"><a href="#!">수정</a></li><?}?>
            </ul>
            <?if($ss_mb_id){?>
            <ul class="goodBad">
              <li class="good"><a href="peolples_good.php?urlGo=<?=$baseurl?>&ReIdxIn=<?=$ReIdx?>&ReIdx=<?=$rowC[ReIdx]?>"><img src="../images/sub/vote/good.png" alt=""><span><?=$rowC[ReGoodNum]?></span></a></li>
              <li class="bad"><a href="peolples_bad.php?urlGo=<?=$baseurl?>&ReIdxIn=<?=$ReIdx?>&ReIdx=<?=$rowC[ReIdx]?>"><img src="../images/sub/vote/bad.png" alt=""><span><?=$rowC[ReBadNum]?></span></a></li>
            </ul>
            <?}?>
          </div>
        </div>
        <form class="writing flex_center" name="form_<?=$form_name?>" method="post" action="peolples_comm_edit.php">
				<input type="hidden" name="ReIdxIn" value="<?=$ReIdx?>">
				<input type="hidden" name="hidden_goods_idx" value="<?=$rowC[ReIdx]?>">
				<input type="hidden" name="urlGo" value="<?=$baseurl?>">
        <input type="text" name="ReConText" value="<?=$rowC[ReContent]?>">
          <a href="javascript:commEdit(document.form_<?=$form_name?>);" class="submitWrite">수정</a>
        </form>
      </div>
      <!-- -->
      
      <?}?>
      
      
      <div class="moreComments">
        <a href="#!">
          <span>더보기</span>
          <i class="fas fa-chevron-down"></i>
        </a>
      </div>
    </section>
    <!-- 댓글 끝 -->