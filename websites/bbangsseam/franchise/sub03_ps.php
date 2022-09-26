<?
	$site_path = '../HyAdmin/';
  require_once($site_path."include/lib.inc.php");

  $ss_mb_id = $_SESSION['ss_mb_id'];

  $ReInDate = date("Y-m-d");
  $ReInTime = date("H:i:s");

	//$ReTel = $ReTel1."-".$ReTel2."-".$ReTel3;
  ///$RePhone = $RePhone1."-".$RePhone2."-".$RePhone3;
  $ReEmail = $ReEmail1."@".$ReEmail2;

  if($nospamchk != "Y") hy_href("","잘못된접근입니다.","","back"); //스팸체크



  $savedir = "../HyAdmin/upload/etcFile"; //이미지업로드경로

  if(strcmp($ReFile,"")) {

    $full_filename = explode(".", "$ReFile_name");
    $extension = $full_filename[sizeof($full_filename)-1];

    $j = 1;
    $k = date("YmdHis");
    $ReFileIn = $j."$k.".$extension;
    $ReFileRelIn = $ReFile_name;

    if(!copy($ReFile,"$savedir/$ReFileIn")) {
      hy_href("","입력실패했습니다. 다시한번 입력해 주세요.","",back);
    }

  }


  $ReMemName = str_replace( "<", "&lt;", $ReMemName );
  $ReMemName = str_replace( ">", "&gt;", $ReMemName );

  $ReTitle = str_replace( "<", "&lt;", $ReTitle );
  $ReTitle = str_replace( ">", "&gt;", $ReTitle );

  $ReEmail = str_replace( "<", "&lt;", $ReEmail );
  $ReEmail = str_replace( ">", "&gt;", $ReEmail );

  $ReContent = str_replace( "<", "&lt;", $ReContent );
  $ReContent = str_replace( ">", "&gt;", $ReContent );



  //메일내용 작성
  $MailContent	=	"
    <table width='750' border='0' cellspacing='0' cellpadding='0'>
      <tr bgcolor='#cccccc'>
        <td height='1' colspan='2' bgcolor='#a0a0a0'></td>
      </tr>
      <tr>
        <td width='17%' height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>업체명</strong></td>
        <td width='83%' style='padding-left:12px;font-size:12px;'>".$ReCompany."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#e0e0e0'></td>
      </tr>
      <tr>
        <td height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>이름</strong></td>
        <td class='font-member' style='padding:5 0 5 12;font-size:12px;'>".$ReMemName."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#e0e0e0'></td>
      </tr>
      <tr>
        <td height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>직함</strong></td>
        <td class='font-member' style='padding:5 0 5 12;font-size:12px;'>".$RePosition."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#e0e0e0'></td>
      </tr>
      <tr>
        <td height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>연락처</strong></td>
        <td style='padding-left:12px;font-size:12px;'>".$ReTel."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#e0e0e0'></td>
      </tr>
      <tr>
        <td height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>이메일</strong></td>
        <td style='padding-left:12px;font-size:12px;'>".$ReEmail."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#e0e0e0'></td>
      </tr>
      <tr>
        <td height='35' bgcolor='#f4f4f4' style='padding-left:12px;font-size:12px;'><strong>내용</strong></td>
        <td style='padding:10px 0 10px 12px;font-size:12px;word-break:break-all'>".nl2br(stripSlashes($ReContent))."</td>
      </tr>
      <tr>
        <td height='1' colspan='2' align='center' bgcolor='#a0a0a0'></td>
      </tr>
    </table>
  ";
  //메일내용 작성



		$dbqry="
			INSERT INTO hy_online(
      `ReIdx`, `ReCatKey`, `ReMemName`, `ReCompany`, `ReTel`,
      `RePhone`, `ReEmail`, `ReTitle`, `RePosition`, `ReFile`, `ReFileRel`,
      `ReEtc1`, `ReEtc2`, `ReEtc3`, `ReEtc4`, `ReEtc5`,
      `ReEtc6`, `ReEtc7`, `ReEtc8`, `ReEtc9`, `ReEtc10`,
      `ReContent`, `ReState`, `ReInDate`, `ReInTime`
			)
			VALUES (
      '', '$ReCatKey', '$ReMemName', '$ReCompany', '$ReTel',
      '$RePhone', '$ReEmail', '$ReTitle', '$RePosition', '$ReFileIn', '$ReFileRelIn',
      '$ReEtc1', '$ReEtc2', '$ReEtc3', '$ReEtc4', '$ReEtc5',
      '$ReEtc6', '$ReEtc7', '$ReEtc8', '$ReEtc9', '$ReEtc10',
      '$ReContent', '$ReState', '$ReInDate', '$ReInTime'
			)
		";
		$row = query($dbqry,$dbcon);




		if(!$row){
?>
<script>
	alert("등록에 실패했습니다. 다시한번 시도해 주세요.");
	history.back(-1);
	exit;
</script>
<?
		}else{


		  //메일보내기
		  $Mail_Content  = base64_encode($MailContent); //메일내용
      $Mail_sendname = $ReMemName; //보내는사람
      $Mail_sendemail = $ReEmail; //보내는메일
      $Mail_getname = "오투베이션"; //받는사람
      $Mail_getemail = "chaesaek@nate.com"; //받는메일
      $Mail_title = $Mail_sendname."님 수강접수가 등록되었습니다."; //메일제목

      $headers  = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=euc-kr\r\n";
      $headers .= "Content-Transfer-Encoding: base64 \r\n";
      $headers .= "From: $Mail_sendname <$Mail_sendemail>\r\n";
      //$headers .= "To: $Mail_getname <$Mail_getemail>\r\n";
      $headers .= "Reply-To: $Mail_sendname <$Mail_sendemail>\r\n";
      $headers .= "X-Priority: 1\r\n";
      $headers .= "X-MSMail-Priority: High\r\n";
      $headers .= "X-Mailer: My Mailer";

      //mail( $Mail_getemail, $Mail_title , $Mail_Content , $headers);
      //메일보내기



      //문자나라 연결
      function SendMesg($url) {
        $fp = fsockopen("211.233.20.184", 80, $errno, $errstr, 10);
        if(!$fp){
		      echo "$errno : $errstr";
		      exit;
	      }

        fwrite($fp, "GET $url HTTP/1.0\r\nHost: 211.233.20.184\r\n\r\n");
        $flag = 0;

        while(!feof($fp)){
          $row = fgets($fp, 1024);

          if($flag) $out .= $row;
          if($row=="\r\n") $flag = 1;
        }
        fclose($fp);
        return $out;
      }

      $userid = "dawon7088";           // 문자나라 아이디
      $passwd = "ja1818189";           // 문자나라 비밀번호
      $hpSender = "010-4772-6803";         // 보내는분 핸드폰번호
      $hpReceiver = "010-3382-7088";       // 받는분의 핸드폰번호
      $adminPhone = "";       // 비상시 메시지를 받으실 관리자 핸드폰번호
      $hpMesg = $ReMemName."[".$RePhone."]님께서 창업상담을 신청하셨습니다.";           // 메시지
      /*  UTF-8 글자셋 이용으로 한글이 깨지는 경우에만 주석을 푸세요. */
      $hpMesg = iconv("UTF-8", "EUC-KR","$hpMesg");
      /*  ---------------------------------------- */
      $hpMesg = urlencode($hpMesg);
      $endAlert = 1;  // 전송완료알림창 ( 1:띄움, 0:안띄움 )

      // 한줄로 이어쓰기 하세요.
      SendMesg("/MSG/send/web_admin_send.htm?userid=$userid&passwd=$passwd&sender=$hpSender&receiver=$hpReceiver&encode=1&end_alert=$endAlert&message=$hpMesg");
      //문자나라 연결


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
	alert("상담신청이 등록되었습니다. 감사합니다.");
	location.href = "sub03.html";
</script>
<?
		}
?>
