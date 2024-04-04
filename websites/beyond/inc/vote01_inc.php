<?
  //전체 투표수
  $query0 = "select * from hy_voteresult where ReCatKey = '$ReIdx'";
  $rs0 = query($query0,$dbcon);
  $count0 = mysql_num_rows($rs0);

  //전체 찬성투표수
  $query1 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '1'";
  $rs1 = query($query1,$dbcon);
  $count1 = mysql_num_rows($rs1);

  //전체 반대투표수
  $query2 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '2'";
  $rs2 = query($query2,$dbcon);
  $count2 = mysql_num_rows($rs2);

  $count1_tot = $count1 + $count2; //전체 투표수
  if($count1_tot > 0){
    $count1_chan = round(($count1 / $count1_tot), 2) * 100; //찬성퍼센트
    $count1_ban = 100 - $count1_chan; //반대퍼센트
  }else{
    $count1_chan = 0; //찬성퍼센트
    $count1_ban = 0; //반대퍼센트
  }

  //남성 찬성투표수
  $query3 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '1' and ReTheSelect = '1'";
  $rs3 = query($query3,$dbcon);
  $count3 = mysql_num_rows($rs3);

  //남성 반대투표수
  $query4 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '1' and ReTheSelect = '2'";
  $rs4 = query($query4,$dbcon);
  $count4 = mysql_num_rows($rs4);

  $count3_tot = $count3 + $count4; //남성 전체투표수
  if($count3_tot > 0){
    $count3_chan = round(($count3 / $count3_tot), 2) * 100; //남성 찬성퍼센트
    $count3_ban = 100 - $count3_chan; //남성 반대퍼센트
  }else{
    $count3_chan = 0; //남성 찬성퍼센트
    $count3_ban = 0; //남성 반대퍼센트
  }


  //여성 찬성투표수
  $query5 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '2' and ReTheSelect = '1'";
  $rs5 = query($query5,$dbcon);
  $count5 = mysql_num_rows($rs5);

  //여성 반대투표수
  $query6 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '2' and ReTheSelect = '2'";
  $rs6 = query($query6,$dbcon);
  $count6 = mysql_num_rows($rs6);

  $count5_tot = $count5 + $count6; //여성 전체투표수
  if($count5_tot > 0){
    $count5_chan = round(($count5 / $count5_tot), 2) * 100; //여성 찬성퍼센트
    $count5_ban = 100 - $count5_chan; //여성 반대퍼센트
  }else{
    $count5_chan = 0; //여성 찬성퍼센트
    $count5_ban = 0; //여성 반대퍼센트
  }


  //서울 찬성투표수
  $query7 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '1' and ReTheSelect = '1'";
  $rs7 = query($query7,$dbcon);
  $count7 = mysql_num_rows($rs7);

  //서울 반대투표수
  $query8 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '1' and ReTheSelect = '2'";
  $rs8 = query($query8,$dbcon);
  $count8 = mysql_num_rows($rs8);

  $count7_tot = $count7 + $count8; //서울 전체투표수
  if($count7_tot > 0){
    $count7_chan = round(($count7 / $count7_tot), 2) * 100; //서울 찬성퍼센트
    $count7_ban = 100 - $count7_chan; //서울 반대퍼센트
  }else{
    $count7_chan = 0; //서울 찬성퍼센트
    $count7_ban = 0; //서울 반대퍼센트
  }


  //인천 찬성투표수
  $query9 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '2' and ReTheSelect = '1'";
  $rs9 = query($query9,$dbcon);
  $count9 = mysql_num_rows($rs9);

  //인천 반대투표수
  $query10 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '2' and ReTheSelect = '2'";
  $rs10 = query($query10,$dbcon);
  $count10 = mysql_num_rows($rs10);

  $count9_tot = $count9 + $count10; //인천 전체투표수
  if($count9_tot > 0){
    $count9_chan = round(($count9 / $count9_tot), 2) * 100; //인천 찬성퍼센트
    $count9_ban = 100 - $count9_chan; //인천 반대퍼센트
  }else{
    $count9_chan = 0; //인천 찬성퍼센트
    $count9_ban = 0; //인천 반대퍼센트
  }


  //경기 찬성투표수
  $query11 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '3' and ReTheSelect = '1'";
  $rs11 = query($query11,$dbcon);
  $count11 = mysql_num_rows($rs11);

  //경기 반대투표수
  $query12 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '3' and ReTheSelect = '2'";
  $rs12 = query($query12,$dbcon);
  $count12 = mysql_num_rows($rs12);

  $count11_tot = $count11 + $count12; //경기 전체투표수
  if($count11_tot > 0){
    $count11_chan = round(($count11 / $count11_tot), 2) * 100; //경기 찬성퍼센트
    $count11_ban = 100 - $count11_chan; //경기 반대퍼센트
  }else{
    $count11_chan = 0; //경기 찬성퍼센트
    $count11_ban = 0; //경기 반대퍼센트
  }


  //강원 찬성투표수
  $query13 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '4' and ReTheSelect = '1'";
  $rs13 = query($query13,$dbcon);
  $count13 = mysql_num_rows($rs13);

  //강원 반대투표수
  $query14 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '4' and ReTheSelect = '2'";
  $rs14 = query($query14,$dbcon);
  $count14 = mysql_num_rows($rs14);

  $count13_tot = $count13 + $count14; //강원 전체투표수
  if($count13_tot > 0){
    $count13_chan = round(($count13 / $count13_tot), 2) * 100; //강원 찬성퍼센트
    $count13_ban = 100 - $count13_chan; //강원 반대퍼센트
  }else{
    $count13_chan = 0; //강원 찬성퍼센트
    $count13_ban = 0; //강원 반대퍼센트
  }


  //충북 찬성투표수
  $query15 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '5' and ReTheSelect = '1'";
  $rs15 = query($query15,$dbcon);
  $count15 = mysql_num_rows($rs15);

  //충북 반대투표수
  $query16 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '5' and ReTheSelect = '2'";
  $rs16 = query($query16,$dbcon);
  $count16 = mysql_num_rows($rs16);

  $count15_tot = $count15 + $count16; //충북 전체투표수
  if($count15_tot > 0){
    $count15_chan = round(($count15 / $count15_tot), 2) * 100; //충북 찬성퍼센트
    $count15_ban = 100 - $count15_chan; //충북 반대퍼센트
  }else{
    $count15_chan = 0; //충북 찬성퍼센트
    $count15_ban = 0; //충북 반대퍼센트
  }


  //충남 찬성투표수
  $query17 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '6' and ReTheSelect = '1'";
  $rs17 = query($query17,$dbcon);
  $count17 = mysql_num_rows($rs17);

  //충남 반대투표수
  $query18 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '6' and ReTheSelect = '2'";
  $rs18 = query($query18,$dbcon);
  $count18 = mysql_num_rows($rs18);

  $count17_tot = $count17 + $count18; //충남 전체투표수
  if($count17_tot > 0){
    $count17_chan = round(($count17 / $count17_tot), 2) * 100; //충남 찬성퍼센트
    $count17_ban = 100 - $count17_chan; //충남 반대퍼센트
  }else{
    $count17_chan = 0; //충남 찬성퍼센트
    $count17_ban = 0; //충남 반대퍼센트
  }


  //세종 찬성투표수
  $query19 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '7' and ReTheSelect = '1'";
  $rs19 = query($query19,$dbcon);
  $count19 = mysql_num_rows($rs19);

  //세종 반대투표수
  $query20 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '7' and ReTheSelect = '2'";
  $rs20 = query($query20,$dbcon);
  $count20 = mysql_num_rows($rs20);

  $count19_tot = $count19 + $count20; //세종 전체투표수
  if($count19_tot > 0){
    $count19_chan = round(($count19 / $count19_tot), 2) * 100; //세종 찬성퍼센트
    $count19_ban = 100 - $count19_chan; //세종 반대퍼센트
  }else{
    $count19_chan = 0; //세종 찬성퍼센트
    $count19_ban = 0; //세종 반대퍼센트
  }


  //대전 찬성투표수
  $query21 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '8' and ReTheSelect = '1'";
  $rs21 = query($query21,$dbcon);
  $count21 = mysql_num_rows($rs21);

  //대전 반대투표수
  $query22 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '8' and ReTheSelect = '2'";
  $rs22 = query($query22,$dbcon);
  $count22 = mysql_num_rows($rs22);

  $count21_tot = $count21 + $count22; //대전 전체투표수
  if($count21_tot > 0){
    $count21_chan = round(($count21 / $count21_tot), 2) * 100; //대전 찬성퍼센트
    $count21_ban = 100 - $count21_chan; //대전 반대퍼센트
  }else{
    $count21_chan = 0; //대전 찬성퍼센트
    $count21_ban = 0; //대전 반대퍼센트
  }


  //전북 찬성투표수
  $query23 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '9' and ReTheSelect = '1'";
  $rs23 = query($query23,$dbcon);
  $count23 = mysql_num_rows($rs23);

  //전북 반대투표수
  $query24 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '9' and ReTheSelect = '2'";
  $rs24 = query($query24,$dbcon);
  $count24 = mysql_num_rows($rs24);

  $count23_tot = $count23 + $count24; //전북 전체투표수
  if($count23_tot > 0){
    $count23_chan = round(($count23 / $count23_tot), 2) * 100; //전북 찬성퍼센트
    $count23_ban = 100 - $count23_chan; //전북 반대퍼센트
  }else{
    $count23_chan = 0; //전북 찬성퍼센트
    $count23_ban = 0; //전북 반대퍼센트
  }


  //전남 찬성투표수
  $query25 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '10' and ReTheSelect = '1'";
  $rs25 = query($query25,$dbcon);
  $count25 = mysql_num_rows($rs25);

  //전남 반대투표수
  $query26 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '10' and ReTheSelect = '2'";
  $rs26 = query($query26,$dbcon);
  $count26 = mysql_num_rows($rs26);

  $count25_tot = $count25 + $count26; //전남 전체투표수
  if($count25_tot > 0){
    $count25_chan = round(($count25 / $count25_tot), 2) * 100; //전남 찬성퍼센트
    $count25_ban = 100 - $count25_chan; //전남 반대퍼센트
  }else{
    $count25_chan = 0; //전남 찬성퍼센트
    $count25_ban = 0; //전남 반대퍼센트
  }


  //광주 찬성투표수
  $query27 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '11' and ReTheSelect = '1'";
  $rs27 = query($query27,$dbcon);
  $count27 = mysql_num_rows($rs27);

  //광주 반대투표수
  $query28 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '11' and ReTheSelect = '2'";
  $rs28 = query($query28,$dbcon);
  $count28 = mysql_num_rows($rs28);

  $count27_tot = $count27 + $count28; //광주 전체투표수
  if($count27_tot > 0){
    $count27_chan = round(($count27 / $count27_tot), 2) * 100; //광주 찬성퍼센트
    $count27_ban = 100 - $count27_chan; //광주 반대퍼센트
  }else{
    $count27_chan = 0; //광주 찬성퍼센트
    $count27_ban = 0; //광주 반대퍼센트
  }


  //경북 찬성투표수
  $query29 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '12' and ReTheSelect = '1'";
  $rs29 = query($query29,$dbcon);
  $count29 = mysql_num_rows($rs29);

  //경북 반대투표수
  $query30 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '12' and ReTheSelect = '2'";
  $rs30 = query($query30,$dbcon);
  $count30 = mysql_num_rows($rs30);

  $count29_tot = $count29 + $count30; //경북 전체투표수
  if($count29_tot > 0){
    $count29_chan = round(($count29 / $count29_tot), 2) * 100; //경북 찬성퍼센트
    $count29_ban = 100 - $count29_chan; //경북 반대퍼센트
  }else{
    $count29_chan = 0; //경북 찬성퍼센트
    $count29_ban = 0; //경북 반대퍼센트
  }


  //경남 찬성투표수
  $query31 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '13' and ReTheSelect = '1'";
  $rs31 = query($query31,$dbcon);
  $count31 = mysql_num_rows($rs31);

  //경남 반대투표수
  $query32 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '13' and ReTheSelect = '2'";
  $rs32 = query($query32,$dbcon);
  $count32 = mysql_num_rows($rs32);

  $count31_tot = $count31 + $count32; //경남 전체투표수
  if($count31_tot > 0){
    $count31_chan = round(($count31 / $count31_tot), 2) * 100; //경남 찬성퍼센트
    $count31_ban = 100 - $count31_chan; //경남 반대퍼센트
  }else{
    $count31_chan = 0; //경남 찬성퍼센트
    $count31_ban = 0; //경남 반대퍼센트
  }


  //대구 찬성투표수
  $query33 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '14' and ReTheSelect = '1'";
  $rs33 = query($query33,$dbcon);
  $count33 = mysql_num_rows($rs33);

  //대구 반대투표수
  $query34 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '14' and ReTheSelect = '2'";
  $rs34 = query($query34,$dbcon);
  $count34 = mysql_num_rows($rs34);

  $count33_tot = $count33 + $count34; //대구 전체투표수
  if($count33_tot > 0){
    $count33_chan = round(($count33 / $count33_tot), 2) * 100; //대구 찬성퍼센트
    $count33_ban = 100 - $count33_chan; //대구 반대퍼센트
  }else{
    $count33_chan = 0; //대구 찬성퍼센트
    $count33_ban = 0; //대구 반대퍼센트
  }


  //부산 찬성투표수
  $query35 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '15' and ReTheSelect = '1'";
  $rs35 = query($query35,$dbcon);
  $count35 = mysql_num_rows($rs35);

  //부산 반대투표수
  $query36 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '15' and ReTheSelect = '2'";
  $rs36 = query($query36,$dbcon);
  $count36 = mysql_num_rows($rs36);

  $count35_tot = $count35 + $count36; //부산 전체투표수
  if($count35_tot > 0){
    $count35_chan = round(($count35 / $count35_tot), 2) * 100; //부산 찬성퍼센트
    $count35_ban = 100 - $count35_chan; //부산 반대퍼센트
  }else{
    $count35_chan = 0; //부산 찬성퍼센트
    $count35_ban = 0; //부산 반대퍼센트
  }


  //울산 찬성투표수
  $query37 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '16' and ReTheSelect = '1'";
  $rs37 = query($query37,$dbcon);
  $count37 = mysql_num_rows($rs37);

  //울산 반대투표수
  $query38 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '16' and ReTheSelect = '2'";
  $rs38 = query($query38,$dbcon);
  $count38 = mysql_num_rows($rs38);

  $count37_tot = $count37 + $count38; //울산 전체투표수
  if($count37_tot > 0){
    $count37_chan = round(($count37 / $count37_tot), 2) * 100; //울산 찬성퍼센트
    $count37_ban = 100 - $count37_chan; //울산 반대퍼센트
  }else{
    $count37_chan = 0; //울산 찬성퍼센트
    $count37_ban = 0; //울산 반대퍼센트
  }


  //제주 찬성투표수
  $query39 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '17' and ReTheSelect = '1'";
  $rs39 = query($query39,$dbcon);
  $count39 = mysql_num_rows($rs39);

  //제주 반대투표수
  $query40 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '17' and ReTheSelect = '2'";
  $rs40 = query($query40,$dbcon);
  $count40 = mysql_num_rows($rs40);

  $count39_tot = $count39 + $count40; //제주 전체투표수
  if($count39_tot > 0){
    $count39_chan = round(($count39 / $count39_tot), 2) * 100; //제주 찬성퍼센트
    $count39_ban = 100 - $count39_chan; //제주 반대퍼센트
  }else{
    $count39_chan = 0; //제주 찬성퍼센트
    $count39_ban = 0; //제주 반대퍼센트
  }


  if($count1){
    $chanper1 = round(($count7 / $count1), 3) * 100; //서울 찬성퍼센트
    $chanper2 = round(($count9 / $count1), 3) * 100; //인천 찬성퍼센트
    $chanper3 = round(($count11 / $count1), 3) * 100; //경기 찬성퍼센트
    $chanper4 = round(($count13 / $count1), 3) * 100; //강원 찬성퍼센트
    $chanper5 = round(($count15 / $count1), 3) * 100; //충북 찬성퍼센트
    $chanper6 = round(($count17 / $count1), 3) * 100; //충남 찬성퍼센트
    $chanper7 = round(($count19 / $count1), 3) * 100; //세종 찬성퍼센트
    $chanper8 = round(($count21 / $count1), 3) * 100; //대전 찬성퍼센트
    $chanper9 = round(($count23 / $count1), 3) * 100; //전북 찬성퍼센트
    $chanper10 = round(($count25 / $count1), 3) * 100; //전남 찬성퍼센트
    $chanper11 = round(($count27 / $count1), 3) * 100; //광주 찬성퍼센트
    $chanper12 = round(($count29 / $count1), 3) * 100; //경북 찬성퍼센트
    $chanper13 = round(($count31 / $count1), 3) * 100; //경남 찬성퍼센트
    $chanper14 = round(($count33 / $count1), 3) * 100; //대구 찬성퍼센트
    $chanper15 = round(($count35 / $count1), 3) * 100; //부산 찬성퍼센트
    $chanper16 = round(($count37 / $count1), 3) * 100; //울산 찬성퍼센트
    $chanper17 = round(($count39 / $count1), 3) * 100; //제주 찬성퍼센트
  }else{
    $chanper1 = 0; //서울 찬성퍼센트
    $chanper2 = 0; //인천 찬성퍼센트
    $chanper3 = 0; //경기 찬성퍼센트
    $chanper4 = 0; //강원 찬성퍼센트
    $chanper5 = 0; //충북 찬성퍼센트
    $chanper6 = 0; //충남 찬성퍼센트
    $chanper7 = 0; //세종 찬성퍼센트
    $chanper8 = 0; //대전 찬성퍼센트
    $chanper9 = 0; //전북 찬성퍼센트
    $chanper10 = 0; //전남 찬성퍼센트
    $chanper11 = 0; //광주 찬성퍼센트
    $chanper12 = 0; //경북 찬성퍼센트
    $chanper13 = 0; //경남 찬성퍼센트
    $chanper14 = 0; //대구 찬성퍼센트
    $chanper15 = 0; //부산 찬성퍼센트
    $chanper16 = 0; //울산 찬성퍼센트
    $chanper17 = 0; //제주 찬성퍼센트
  }

  if($count2){
    $banper1 = round(($count8 / $count2), 3) * 100; //서울 반대퍼센트
    $banper2 = round(($count10 / $count2), 3) * 100; //인천 반대퍼센트
    $banper3 = round(($count12 / $count2), 3) * 100; //경기 반대퍼센트
    $banper4 = round(($count14 / $count2), 3) * 100; //강원 반대퍼센트
    $banper5 = round(($count16 / $count2), 3) * 100; //충북 반대퍼센트
    $banper6 = round(($count18 / $count2), 3) * 100; //충남 반대퍼센트
    $banper7 = round(($count20 / $count2), 3) * 100; //세종 반대퍼센트
    $banper8 = round(($count22 / $count2), 3) * 100; //대전 반대퍼센트
    $banper9 = round(($count24 / $count2), 3) * 100; //전북 반대퍼센트
    $banper10 = round(($count26 / $count2), 3) * 100; //전남 반대퍼센트
    $banper11 = round(($count28 / $count2), 3) * 100; //광주 반대퍼센트
    $banper12 = round(($count30 / $count2), 3) * 100; //경북 반대퍼센트
    $banper13 = round(($count32 / $count2), 3) * 100; //경남 반대퍼센트
    $banper14 = round(($count34 / $count2), 3) * 100; //대구 반대퍼센트
    $banper15 = round(($count36 / $count2), 3) * 100; //부산 반대퍼센트
    $banper16 = round(($count38 / $count2), 3) * 100; //울산 반대퍼센트
    $banper17 = round(($count40 / $count2), 3) * 100; //제주 반대퍼센트
  }else{
    $banper1 = 0; //서울 반대퍼센트
    $banper2 = 0; //인천 반대퍼센트
    $banper3 = 0; //경기 반대퍼센트
    $banper4 = 0; //강원 반대퍼센트
    $banper5 = 0; //충북 반대퍼센트
    $banper6 = 0; //충남 반대퍼센트
    $banper7 = 0; //세종 반대퍼센트
    $banper8 = 0; //대전 반대퍼센트
    $banper9 = 0; //전북 반대퍼센트
    $banper10 = 0; //전남 반대퍼센트
    $banper11 = 0; //광주 반대퍼센트
    $banper12 = 0; //경북 반대퍼센트
    $banper13 = 0; //경남 반대퍼센트
    $banper14 = 0; //대구 반대퍼센트
    $banper15 = 0; //부산 반대퍼센트
    $banper16 = 0; //울산 반대퍼센트
    $banper17 = 0; //제주 반대퍼센트
  }


  //10대 찬성투표수
  $query41 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and (ReMemYear = '0' or ReMemYear = '1') and ReTheSelect = '1'";
  $rs41 = query($query41,$dbcon);
  $count41 = mysql_num_rows($rs41);

  //10대 반대투표수
  $query42 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and (ReMemYear = '0' or ReMemYear = '1') and ReTheSelect = '2'";
  $rs42 = query($query42,$dbcon);
  $count42 = mysql_num_rows($rs42);

  //20대 찬성투표수
  $query43 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '2' and ReTheSelect = '1'";
  $rs43 = query($query43,$dbcon);
  $count43 = mysql_num_rows($rs43);

  //20대 반대투표수
  $query44 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '2' and ReTheSelect = '2'";
  $rs44 = query($query44,$dbcon);
  $count44 = mysql_num_rows($rs44);

  //30대 찬성투표수
  $query45 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '3' and ReTheSelect = '1'";
  $rs45 = query($query45,$dbcon);
  $count45 = mysql_num_rows($rs45);

  //30대 반대투표수
  $query46 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '3' and ReTheSelect = '2'";
  $rs46 = query($query46,$dbcon);
  $count46 = mysql_num_rows($rs46);

  //40대 찬성투표수
  $query47 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '4' and ReTheSelect = '1'";
  $rs47 = query($query47,$dbcon);
  $count47 = mysql_num_rows($rs47);

  //40대 반대투표수
  $query48 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '4' and ReTheSelect = '2'";
  $rs48 = query($query48,$dbcon);
  $count48 = mysql_num_rows($rs48);

  //50대 찬성투표수
  $query49 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '5' and ReTheSelect = '1'";
  $rs49 = query($query49,$dbcon);
  $count49 = mysql_num_rows($rs49);

  //50대 반대투표수
  $query50 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemYear = '5' and ReTheSelect = '2'";
  $rs50 = query($query50,$dbcon);
  $count50 = mysql_num_rows($rs50);

  //60대이상 찬성투표수
  $query51 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and (ReMemYear = '6' or ReMemYear = '7' or ReMemYear = '8' or ReMemYear = '9' or ReMemYear = '10') and ReTheSelect = '1'";
  $rs51 = query($query51,$dbcon);
  $count51 = mysql_num_rows($rs51);

  //60대이상 반대투표수
  $query52 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and (ReMemYear = '6' or ReMemYear = '7' or ReMemYear = '8' or ReMemYear = '9' or ReMemYear = '10') and ReTheSelect = '2'";
  $rs52 = query($query52,$dbcon);
  $count52 = mysql_num_rows($rs52);


  $count41_tot = $count41 + $count42; //10대 전체투표수
  $count43_tot = $count43 + $count44; //20대 전체투표수
  $count45_tot = $count45 + $count46; //30대 전체투표수
  $count47_tot = $count47 + $count48; //40대 전체투표수
  $count49_tot = $count49 + $count50; //50대 전체투표수
  $count51_tot = $count51 + $count52; //60대 전체투표수


  if($count41_tot > 0){
    $count41_chan = round(($count41 / $count41_tot), 2) * 100; //10대 찬성퍼센트
    $count41_ban = 100 - $count41_chan; //10대 반대퍼센트
  }else{
    $count41_chan = 0; //10대 찬성퍼센트
    $count41_ban = 0; //10대 반대퍼센트
  }
  if($count43_tot > 0){
    $count43_chan = round(($count43 / $count43_tot), 2) * 100; //20대 찬성퍼센트
    $count43_ban = 100 - $count43_chan; //20대 반대퍼센트
  }else{
    $count43_chan = 0; //20대 찬성퍼센트
    $count43_ban = 0; //20대 반대퍼센트
  }
  if($count45_tot > 0){
    $count45_chan = round(($count45 / $count45_tot), 2) * 100; //30대 찬성퍼센트
    $count45_ban = 100 - $count45_chan; //30대 반대퍼센트
  }else{
    $count45_chan = 0; //30대 찬성퍼센트
    $count45_ban = 0; //30대 반대퍼센트
  }
  if($count47_tot > 0){
    $count47_chan = round(($count47 / $count47_tot), 2) * 100; //40대 찬성퍼센트
    $count47_ban = 100 - $count47_chan; //40대 반대퍼센트
  }else{
    $count47_chan = 0; //40대 찬성퍼센트
    $count47_ban = 0; //40대 반대퍼센트
  }
  if($count49_tot > 0){
    $count49_chan = round(($count49 / $count49_tot), 2) * 100; //50대 찬성퍼센트
    $count49_ban = 100 - $count49_chan; //50대 반대퍼센트
  }else{
    $count49_chan = 0; //50대 찬성퍼센트
    $count49_ban = 0; //50대 반대퍼센트
  }
  if($count51_tot > 0){
    $count51_chan = round(($count51 / $count51_tot), 2) * 100; //60대 찬성퍼센트
    $count51_ban = 100 - $count51_chan; //60대 반대퍼센트
  }else{
    $count51_chan = 0; //60대 찬성퍼센트
    $count51_ban = 0; //60대 반대퍼센트
  }

?>



    <!-- 찬반 현황팝업 -->
    <div class="votePop_wrap">
      <div class="votedBox">
        <p class="close_pop"><i class="fas fa-times"></i></p>

        <div class="edbox ynlLists">
          <div class="ynViews">

            <dl class="ynDl">
              <dt>찬성</dt>
              <dd class="dd_yes"><span class="counter" data-number="<?=$count1_chan?>"><?=$count1_chan?></span>%</dd>
            </dl>

            <div class="yngraph flex_center">
              <div class="yes_color"></div>
              <div class="no_color"></div>
            </div>
            <dl class="ynDl">
              <dt>반대</dt>
              <dd class="dd_no"><span class="counter" data-number="<?=$count1_ban?>"><?=$count1_ban?></span>%</dd>
            </dl>

          </div>
        </div>

        <ul class="popsTab">
          <li class="tabOn"><a href="#tab01">성별</a></li>
          <li><a href="#tab02">지역별</a></li>
          <li><a href="#tab03">나이별</a></li>
        </ul>

        <div id="tab01" class="edbox hidden votedGraph">

          <div class="agers">
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count3_chan?>"><?=$count3_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count3_ban?>"><?=$count3_ban?></span>%</dd>
              </dl>
            </div>
            <p class="voteVal">남성</p>
          </div>

          <div class="agers">
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count5_chan?>"><?=$count5_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count5_ban?>"><?=$count5_ban?></span>%</dd>
              </dl>
            </div>
            <p class="voteVal">여성</p>
          </div>


        </div>

        <div id="tab02" class="edbox hidden votedGraph">
          <div class="flex_center">
            <div class="mapStore">
              <div class="map_img yesArea">
                <img src="../images/sub/vote/map_img.png" alt="">
                <p id="seoul" class="locate_btn current">서울
                  <span><em class="counter"><?=$chanper1?></em>%</span>
                </p>
                <p id="incheon" class="locate_btn">인천
                  <span><em class="counter"><?=$chanper2?></em>%</span>
                </p>
                <p id="gyungi" class="locate_btn">경기
                  <span><em class="counter"><?=$chanper3?></em>%</span>
                </p>
                <p id="gangwon" class="locate_btn">강원
                  <span><em class="counter"><?=$chanper4?></em>%</span>
                </p>
                <p id="chungbook" class="locate_btn">충북
                  <span><em class="counter"><?=$chanper5?></em>%</span>
                </p>
                <p id="chungnam" class="locate_btn">충남
                  <span><em class="counter"><?=$chanper6?></em>%</span>
                </p>
                <p id="sejong" class="locate_btn">세종
                  <span><em class="counter"><?=$chanper7?></em>%</span>
                </p>
                <p id="daejeon" class="locate_btn">대전
                  <span><em class="counter"><?=$chanper8?></em>%</span>
                </p>
                <p id="kyungbook" class="locate_btn">경북
                  <span><em class="counter"><?=$chanper12?></em>%</span>
                </p>
                <p id="daegoo" class="locate_btn">대구
                  <span><em class="counter"><?=$chanper14?></em>%</span>
                </p>
                <p id="ulsan" class="locate_btn">울산
                  <span><em class="counter"><?=$chanper16?></em>%</span>
                </p>
                <p id="kyungnam" class="locate_btn">경남
                  <span><em class="counter"><?=$chanper13?></em>%</span>
                </p>
                <p id="busan" class="locate_btn">부산
                  <span><em class="counter"><?=$chanper15?></em>%</span>
                </p>
                <p id="jeonbook" class="locate_btn">전북
                  <span><em class="counter"><?=$chanper9?></em>%</span>
                </p>
                <p id="gwangju" class="locate_btn">광주
                  <span><em class="counter"><?=$chanper11?></em>%</span>
                </p>
                <p id="jeonam" class="locate_btn">전남
                  <span><em class="counter"><?=$chanper10?></em>%</span>
                </p>
                <p id="jeju" class="locate_btn">제주
                  <span><em class="counter"><?=$chanper17?></em>%</span>
                </p>
              </div>
              <p class="voteVal">찬성</p>
            </div>

            <div class="mapStore">
              <div class="map_img noArea">
                <img src="../images/sub/vote/map_img.png" alt="">
                <p id="seoul" class="locate_btn current">서울
                  <span><em class="counter"><?=$banper1?></em>%</span>
                </p>
                <p id="incheon" class="locate_btn">인천
                  <span><em class="counter"><?=$banper2?></em>%</span>
                </p>
                <p id="gyungi" class="locate_btn">경기
                  <span><em class="counter"><?=$banper3?></em>%</span>
                </p>
                <p id="gangwon" class="locate_btn">강원
                  <span><em class="counter"><?=$banper4?></em>%</span>
                </p>
                <p id="chungbook" class="locate_btn">충북
                  <span><em class="counter"><?=$banper5?></em>%</span>
                </p>
                <p id="chungnam" class="locate_btn">충남
                  <span><em class="counter"><?=$banper6?></em>%</span>
                </p>
                <p id="sejong" class="locate_btn">세종
                  <span><em class="counter"><?=$banper7?></em>%</span>
                </p>
                <p id="daejeon" class="locate_btn">대전
                  <span><em class="counter"><?=$banper8?></em>%</span>
                </p>
                <p id="kyungbook" class="locate_btn">경북
                  <span><em class="counter"><?=$banper12?></em>%</span>
                </p>
                <p id="daegoo" class="locate_btn">대구
                  <span><em class="counter"><?=$banper14?></em>%</span>
                </p>
                <p id="ulsan" class="locate_btn">울산
                  <span><em class="counter"><?=$banper16?></em>%</span>
                </p>
                <p id="kyungnam" class="locate_btn">경남
                  <span><em class="counter"><?=$banper13?></em>%</span>
                </p>
                <p id="busan" class="locate_btn">부산
                  <span><em class="counter"><?=$banper15?></em>%</span>
                </p>
                <p id="jeonbook" class="locate_btn">전북
                  <span><em class="counter"><?=$banper9?></em>%</span>
                </p>
                <p id="gwangju" class="locate_btn">광주
                  <span><em class="counter"><?=$banper11?></em>%</span>
                </p>
                <p id="jeonam" class="locate_btn">전남
                  <span><em class="counter"><?=$banper10?></em>%</span>
                </p>
                <p id="jeju" class="locate_btn">제주
                  <span><em class="counter"><?=$banper17?></em>%</span>
                </p>
              </div>
              <p class="voteVal">반대</p>
            </div>
          </div>
        </div>

        <div id="tab03" class="edbox hidden votedGraph">
          <div class="agers agesBox flex_center">
            <p class="voteVal">10대</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count41_chan?>"><?=$count41_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count41_ban?>"><?=$count41_ban?></span>%</dd>
              </dl>
            </div>
          </div>
          <div class="agers agesBox flex_center">
            <p class="voteVal">20대</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count43_chan?>"><?=$count43_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count43_ban?>"><?=$count43_ban?></span>%</dd>
              </dl>
            </div>
          </div>
          <div class="agers agesBox flex_center">
            <p class="voteVal">30대</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count45_chan?>"><?=$count45_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count45_ban?>"><?=$count45_ban?></span>%</dd>
              </dl>
            </div>
          </div>
          <div class="agers agesBox flex_center">
            <p class="voteVal">40대</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count47_chan?>"><?=$count47_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count47_ban?>"><?=$count47_ban?></span>%</dd>
              </dl>
            </div>
          </div>
          <div class="agers agesBox flex_center">
            <p class="voteVal">50대</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count49_chan?>"><?=$count49_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count49_ban?>"><?=$count49_ban?></span>%</dd>
              </dl>
            </div>
          </div>
          <div class="agers agesBox flex_center">
            <p class="voteVal">60대 이상</p>
            <div class="ynViews">
              <dl class="ynDl">
                <dt>찬성</dt>
                <dd class="dd_yes"><span class="counter" data-number="<?=$count51_chan?>"><?=$count51_chan?></span>%</dd>
              </dl>

              <div class="yngraph flex_center">
                <div class="yes_color"></div>
                <div class="no_color"></div>
              </div>

              <dl class="ynDl">
                <dt>반대</dt>
                <dd class="dd_no"><span class="counter" data-number="<?=$count51_ban?>"><?=$count51_ban?></span>%</dd>
              </dl>
            </div>
          </div>
        </div>

      </div>
      <div class="blk_bg"></div>
    </div>
    <!-- 현황팝업끝 -->