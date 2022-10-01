<?
	$CellSize = 22;

	if (!$year) {
		$year	= date("Y");
		$month	= date("m");
	}

	$prev		= date("Y-m",mktime(0,0,0,$month-1,1,$year));
	$prevArray	= split("-",$prev);
	$prevYear	= $prevArray[0];
	$prevMonth	= $prevArray[1];

	$next		= date("Y-m",mktime(0,0,0,$month+1,1,$year));
	$nextArray	= split("-",$next);
	$nextYear	= $nextArray[0];
	$nextMonth	= $nextArray[1];
?>

<div class="monthHy"><a href="<?echo $PHP_SELF?>?CatNo=<?=$CatNo?>&year=<?=$prevYear?>&month=<?=$prevMonth?>&keynum=<?=$keynum?>&admin_name=<?=$admin_name?>" onfocus="this.blur();"><img src="/HyAdmin/admin/imagesO2/icon_mleft.gif" alt="left" /></a><span><?=$year?>³â <?=$month?>¿ù</span><a href="<?echo $PHP_SELF?>?CatNo=<?=$CatNo?>&year=<?=$nextYear?>&month=<?=$nextMonth?>&keynum=<?=$keynum?>&admin_name=<?=$admin_name?>" onfocus="this.blur();"><img src="/HyAdmin/admin/imagesO2/icon_mright.gif" alt="right" /></a></div>



<script language="javascript">
<!--
	function SelectedDay(text1) {
		var URL = "calendar_pop.html?ReIdx=" + text1
		window.open(URL,"subwindows","top=150, left=150, width=400, height=300, scrollbars=yes");
	}
-->
</script>


<?
	$admin_id = "admin";

	$FirstDayPosition	= date("w",mktime(0,0,0,$month,1,$year)) + 1;
	$TotalDay			= date("t", mktime(0, 0, 0, $month, 1, $year));

	$StartMonth	= $year."-".$month."-1";
	$LastMonth	= $year."-".$month."-".$TotalDay;

	$sql = "select * from hy_calendar ";
	$sql = $sql."where (1=1) ";
	$sql = $sql."and ReCalDay between '$StartMonth' and '$LastMonth' and ReKeynum = '$CatNo' ";
	$sql = $sql."order by ReCalDay";

	$result = mysql_query($sql,$dbcon);
	$recordCount = mysql_num_rows($result);

	while ($row = mysql_fetch_array($result)) {
		$calendar_date = $row[calendar_date];
		$ext = explode("-",$calendar_date);

		if (!$resultDay) {
			$resultDay = $ext[2];
		} else {
			$resultDay = $resultDay.",".$ext[2];
		}

	}
?>




      <table cellpadding="0" cellspacing="0" class="scheduleHy">
				<colgroup>
					<col width="14.3%">
					<col width="14.2%">
					<col width="14.3%">
					<col width="14.3%">
					<col width="14.3%">
					<col width="14.3%">
				</colgroup>
				<thead>
					<tr height="39">
						<td class="holiday" style="border-top:solid 2px #616161;">SUN</td>
						<td style="border-top:solid 2px #616161;">MON</td>
						<td style="border-top:solid 2px #616161;">TUE</td>
						<td style="border-top:solid 2px #616161;">WED</td>
						<td style="border-top:solid 2px #616161;">THU</td>
						<td style="border-top:solid 2px #616161;">FRI</td>
						<td style="border-top:solid 2px #616161;">SAT</td>
					</tr>
				</thead>
				<tbody>

				  <?
          	$line = 5;
          	if (($FirstDayPosition > 5) && (ceil($TotalDay/5) == 7)) $line = 6;
          	if (($FirstDayPosition == 1) && ($TotalDay == 28)) $line =4;
          	if (($FirstDayPosition == 7) && ($TotalDay == 30)) $line =6;

          	$k = 0;

          	for ($i=1; $i<=$line; $i++) {
          ?>

					<tr>

					  <?
        		for ($j=1; $j<=7; $j++) {
        			if ((!$day) && ($j == $FirstDayPosition)) $day = 1;

        			$classValue = "schedule_txt11";
        			if ($j == 1) $classValue = "schedule_txt1";
        			if ($j == 7) $classValue = "schedule_txt11";

        			if ($day > 0){
        				$ext = explode(",",$resultDay);

        				if ($day == $ext[$k]) {
        					$CellColor = "ghostwhite";
        					$k++;
        				} else {
        					$CellColor = "";
        				}


        				$monthlen = strlen($month);
        				if($monthlen==1){ $month = "0".$month; }

        				$daylen = strlen($day);
        				if($daylen==1){ $day = "0".$day; }

        				$dates = $year."-".$month."-".$day;
        				$query = "select * from hy_calendar where ReCalDay='$dates' and ReKeynum = '$CatNo' order by ReIdx asc";
        				$rs = mysql_query($query,$dbcon);
        				$counts = mysql_num_rows($rs);

        				$dayColor = "#F3F3F3";

        				$todayday = date("Y-m-d");
        				if($dates == $todayday) $todayChk = " class='todayHy'";
        				else $todayChk = "";
        			?>


						<td <?=$todayChk?> ><?if($j==1){?><font color="#fff"><?}?><?=$day?></font>
							<?
                for($k=0;$k<$counts;$k++){
                  $row1 = mysql_fetch_array($rs);

                  $ReTimeS1 = $row1[ReTimeS1];
                  $ReTimeS2 = $row1[ReTimeS2];
                  $ReTimeE1 = $row1[ReTimeE1];
                  $ReTimeE2 = $row1[ReTimeE2];

                  if($ReTimeS1!="" && $ReTimeS2!=""){
                    $ReTimeTit = $ReTimeS1.":".$ReTimeS2."~".$ReTimeE1.":".$ReTimeE2."&nbsp;";
                  }else{
                    $ReTimeTit = "";
                  }
    				  ?>

    				      <?if($row1[ReHollyChk]=="Y"){?>

      					    <br><a href="javascript:SelectedDay('<?=$row1[ReIdx]?>')"><font color=red><span style="font-size:12px"><?=$ReTimeTit?><?=$row1[ReTitle]?></span></font></a>

      					  <?}else{?>

      					    <br><a href="javascript:SelectedDay('<?=$row1[ReIdx]?>')"><font color=#fff><span style="font-size:12px"><?=$ReTimeTit?><?=$row1[ReTitle]?></span></font></a>

      					  <?}?>

    					<?
    					  }
    					?>
						</td>

						<?
        		  } else {
            ?>

            <td><?=$day?>
							<!--table cellpadding="0" cellspacing="0" class="dayHy">
								<tr>
									<td>10:00 ~ 11:50</td>
									<td></td>
								</tr>
								<tr>
									<td>12:00 ~ 13:50</td>
									<td><img src="../images/sub/icon_ok.gif" alt="" /></td>
								</tr>
								<tr>
									<td>14:00 ~ 15:50</td>
									<td></td>
								</tr>
								<tr>
									<td>16:00 ~ 18:00</td>
									<td></td>
								</tr>
							</table-->
						</td>

						<?
          			}

          			if ($day != $TotalDay) {
          				if (($day > 0) && ($day < $TotalDay)) $day++;
          			} else {
          				$day = "&nbsp;";
          			}
          		}
            ?>

					</tr>

					<?
          	}
          ?>

				</tbody>
			</table>














