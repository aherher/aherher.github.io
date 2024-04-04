<?
  //투표상세정보
  $queryV = "select * from hy_voteview where ReIdx='$ReIdx'";
  $rsV = query($queryV,$dbcon);
  $rowV = mysql_fetch_array($rsV);

  //전체 투표수
  $queryT = "select * from hy_voteresult where ReCatKey = '$ReIdx'";
  $rsT = query($queryT,$dbcon);
  $countT = mysql_num_rows($rsT);
  
  //1번 투표수
  $query1 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '1'";
  $rs1 = query($query1,$dbcon);
  $count1 = mysql_num_rows($rs1);
  
  //2번 투표수
  $query2 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '2'";
  $rs2 = query($query2,$dbcon);
  $count2 = mysql_num_rows($rs2);
  
  //3번 투표수
  $query3 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '3'";
  $rs3 = query($query3,$dbcon);
  $count3 = mysql_num_rows($rs3);
  
  //4번 투표수
  $query4 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '4'";
  $rs4 = query($query4,$dbcon);
  $count4 = mysql_num_rows($rs4);
  
  //5번 투표수
  $query5 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReTheSelect = '5'";
  $rs5 = query($query5,$dbcon);
  $count5 = mysql_num_rows($rs5);
  
  
  
  if($countT > 0){
    $count1_per = round(($count1 / $countT), 2) * 100; //1번 퍼센트
    $count2_per = round(($count2 / $countT), 2) * 100; //2번 퍼센트
    $count3_per = round(($count3 / $countT), 2) * 100; //3번 퍼센트
    $count4_per = round(($count4 / $countT), 2) * 100; //4번 퍼센트
    $count5_per = round(($count5 / $countT), 2) * 100; //5번 퍼센트
  }else{
    $count1_per = 0; //1번 퍼센트
    $count2_per = 0; //2번 퍼센트
    $count3_per = 0; //3번 퍼센트
    $count4_per = 0; //4번 퍼센트
    $count5_per = 0; //5번 퍼센트
  }
  
  
  
  //서울 투표수
  $query6 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '1'";
  $rs6 = query($query6,$dbcon);
  $count6 = mysql_num_rows($rs6);
  
  if($count6 > 0){
    $count6_per = round(($count6 / $countT), 3) * 100; //서울 퍼센트
  }else{
    $count6_per = 0; //서울 퍼센트
  }
  
  
  //인천 투표수
  $query7 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '2'";
  $rs7 = query($query7,$dbcon);
  $count7 = mysql_num_rows($rs7);
  
  if($count7 > 0){
    $count7_per = round(($count7 / $countT), 3) * 100; //인천 퍼센트
  }else{
    $count7_per = 0; //인천 퍼센트
  }
  
  
  //경기 투표수
  $query8 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '3'";
  $rs8 = query($query8,$dbcon);
  $count8 = mysql_num_rows($rs8);
  
  if($count8 > 0){
    $count8_per = round(($count8 / $countT), 3) * 100; //경기 퍼센트
  }else{
    $count8_per = 0; //경기 퍼센트
  }
  
  
  //강원 투표수
  $query9 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '4'";
  $rs9 = query($query9,$dbcon);
  $count9 = mysql_num_rows($rs9);
  
  if($count9 > 0){
    $count9_per = round(($count9 / $countT), 3) * 100; //강원 퍼센트
  }else{
    $count9_per = 0; //강원 퍼센트
  }
  
  
  //충북 투표수
  $query10 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '5'";
  $rs10 = query($query10,$dbcon);
  $count10 = mysql_num_rows($rs10);
  
  if($count10 > 0){
    $count10_per = round(($count10 / $countT), 3) * 100; //충북 퍼센트
  }else{
    $count10_per = 0; //충북 퍼센트
  }
  
  
  //충남 투표수
  $query11 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '6'";
  $rs11 = query($query11,$dbcon);
  $count11 = mysql_num_rows($rs11);
  
  if($count11 > 0){
    $count11_per = round(($count11 / $countT), 3) * 100; //충남 퍼센트
  }else{
    $count11_per = 0; //충남 퍼센트
  }
  
  
  //세종 투표수
  $query12 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '7'";
  $rs12 = query($query12,$dbcon);
  $count12 = mysql_num_rows($rs12);
  
  if($count12 > 0){
    $count12_per = round(($count12 / $countT), 3) * 100; //세종 퍼센트
  }else{
    $count12_per = 0; //세종 퍼센트
  }
  
  
  //대전 투표수
  $query13 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '8'";
  $rs13 = query($query13,$dbcon);
  $count13 = mysql_num_rows($rs13);
  
  if($count13 > 0){
    $count13_per = round(($count13 / $countT), 3) * 100; //대전 퍼센트
  }else{
    $count13_per = 0; //대전 퍼센트
  }
  
  
  //전북 투표수
  $query14 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '9'";
  $rs14 = query($query14,$dbcon);
  $count14 = mysql_num_rows($rs14);
  
  if($count14 > 0){
    $count14_per = round(($count14 / $countT), 3) * 100; //전북 퍼센트
  }else{
    $count14_per = 0; //전북 퍼센트
  }
  
  
  //전남 투표수
  $query15 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '10'";
  $rs15 = query($query15,$dbcon);
  $count15 = mysql_num_rows($rs15);
  
  if($count15 > 0){
    $count15_per = round(($count15 / $countT), 3) * 100; //전남 퍼센트
  }else{
    $count15_per = 0; //전남 퍼센트
  }
  
  
  //광주 투표수
  $query16 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '11'";
  $rs16 = query($query16,$dbcon);
  $count16 = mysql_num_rows($rs16);
  
  if($count16 > 0){
    $count16_per = round(($count16 / $countT), 3) * 100; //광주 퍼센트
  }else{
    $count16_per = 0; //광주 퍼센트
  }
  
  
  //경북 투표수
  $query17 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '12'";
  $rs17 = query($query17,$dbcon);
  $count17 = mysql_num_rows($rs17);
  
  if($count17 > 0){
    $count17_per = round(($count17 / $countT), 3) * 100; //경북 퍼센트
  }else{
    $count17_per = 0; //경북 퍼센트
  }
  
  
  //경남 투표수
  $query18 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '13'";
  $rs18 = query($query18,$dbcon);
  $count18 = mysql_num_rows($rs18);
  
  if($count18 > 0){
    $count18_per = round(($count18 / $countT), 3) * 100; //경남 퍼센트
  }else{
    $count18_per = 0; //경남 퍼센트
  }
  
  
  //대구 투표수
  $query19 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '14'";
  $rs19 = query($query19,$dbcon);
  $count19 = mysql_num_rows($rs19);
  
  if($count19 > 0){
    $count19_per = round(($count19 / $countT), 3) * 100; //대구 퍼센트
  }else{
    $count19_per = 0; //대구 퍼센트
  }
  
  
  //부산 투표수
  $query20 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '15'";
  $rs20 = query($query20,$dbcon);
  $count20 = mysql_num_rows($rs20);
  
  if($count20 > 0){
    $count20_per = round(($count20 / $countT), 3) * 100; //부산 퍼센트
  }else{
    $count20_per = 0; //부산 퍼센트
  }
  
  
  //울산 투표수
  $query21 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '16'";
  $rs21 = query($query21,$dbcon);
  $count21 = mysql_num_rows($rs21);
  
  if($count21 > 0){
    $count21_per = round(($count21 / $countT), 3) * 100; //울산 찬성퍼센트
  }else{
    $count21_per = 0; //울산 찬성퍼센트
  }
  
  
  //제주 투표수
  $query22 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemArea = '17'";
  $rs22 = query($query22,$dbcon);
  $count22 = mysql_num_rows($rs22);
  
  if($count22 > 0){
    $count22_per = round(($count22 / $countT), 3) * 100; //제주 퍼센트
  }else{
    $count22_per = 0; //제주 퍼센트
  }
  
  
  //남성 투표수
  $query23 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '1'";
  $rs23 = query($query23,$dbcon);
  $count23 = mysql_num_rows($rs23);
  
  if($count23 > 0){
    $count23_per = round(($count23 / $countT), 2) * 100; //남성 퍼센트
  }else{
    $count23_per = 0; //남성 퍼센트
  }
  
  
  //여성 투표수
  $query24 = "select * from hy_voteresult where ReCatKey = '$ReIdx' and ReMemSex = '2'";
  $rs24 = query($query24,$dbcon);
  $count24 = mysql_num_rows($rs24);
  
  if($count24 > 0){
    $count24_per = round(($count24 / $countT), 2) * 100; //여성 퍼센트
  }else{
    $count24_per = 0; //여성 퍼센트
  }
  
  
?>

    <!-- 현황팝업 -->
    <div class="votePop_wrap">
      <div class="votedBox">
        <p class="close_pop"><i class="fas fa-times"></i></p>
        <ul class="edbox barsLists">
          
          <?if($rowV[ReVotenum1]){?>
          <li>
            <article class="edinTxt flex_center">
              <p class="edTxt01"><?=$rowV[ReVotenum1]?></p>
              <p class="edTxt02"><span class="counter percent"><?=$count1_per?></span>% (<span class="counter"><?=number_format($count1)?></span>명)</p>
            </article>
            <div class="prograve heighest"><span></span></div> <!-- 가장 높은 득표율 -->
          </li>
          <?}?>
          <?if($rowV[ReVotenum2]){?>
          <li>
            <article class="edinTxt flex_center">
              <p class="edTxt01"><?=$rowV[ReVotenum2]?></p>
              <p class="edTxt02"><span class="counter percent"><?=$count2_per?></span>% (<span class="counter"><?=number_format($count2)?></span>명)</p>
            </article>
            <div class="prograve"><span></span></div>
          </li>
          <?}?>
          <?if($rowV[ReVotenum3]){?>
          <li>
            <article class="edinTxt flex_center">
              <p class="edTxt01"><?=$rowV[ReVotenum3]?></p>
              <p class="edTxt02"><span class="counter percent"><?=$count3_per?></span>% (<span class="counter"><?=number_format($count3)?></span>명)</p>
            </article>
            <div class="prograve"><span></span></div>
          </li>
          <?}?>
          <?if($rowV[ReVotenum4]){?>
          <li>
            <article class="edinTxt flex_center">
              <p class="edTxt01"><?=$rowV[ReVotenum4]?></p>
              <p class="edTxt02"><span class="counter percent"><?=$count4_per?></span>% (<span class="counter"><?=number_format($count4)?></span>명)</p>
            </article>
            <div class="prograve"><span></span></div>
          </li>
          <?}?>
          <?if($rowV[ReVotenum5]){?>
          <li>
            <article class="edinTxt flex_center">
              <p class="edTxt01"><?=$rowV[ReVotenum5]?></p>
              <p class="edTxt02"><span class="counter percent"><?=$count5_per?></span>% (<span class="counter"><?=number_format($count5)?></span>명)</p>
            </article>
            <div class="prograve"><span></span></div>
          </li>
          <?}?>
        </ul>
        <div class="edbox votedGraph flex_center">

          <div class="gender">

            <figure class="highcharts-figure">
              <div id="container"></div>
            </figure>

            <p id="test" class="voteVal">성별</p>
          </div>

          <div class="mapStore">
            <div class="map_img">
              <img src="../images/sub/vote/map_img.png" alt="">
              <p id="seoul" class="locate_btn current">서울
                <span><em class="counter"><?=$count6_per?></em>%</span>
              </p>
              <p id="incheon" class="locate_btn">인천
                <span><em class="counter"><?=$count7_per?></em>%</span>
              </p>
              <p id="gyungi" class="locate_btn">경기
                <span><em class="counter"><?=$count8_per?></em>%</span>
              </p>
              <p id="gangwon" class="locate_btn">강원
                <span><em class="counter"><?=$count9_per?></em>%</span>
              </p>
              <p id="chungbook" class="locate_btn">충북
                <span><em class="counter"><?=$count10_per?></em>%</span>
              </p>
              <p id="chungnam" class="locate_btn">충남
                <span><em class="counter"><?=$count11_per?></em>%</span>
              </p>
              <p id="sejong" class="locate_btn">세종
                <span><em class="counter"><?=$count12_per?></em>%</span>
              </p>
              <p id="daejeon" class="locate_btn">대전
                <span><em class="counter"><?=$count13_per?></em>%</span>
              </p>
              <p id="kyungbook" class="locate_btn">경북
                <span><em class="counter"><?=$count17_per?></em>%</span>
              </p>
              <p id="daegoo" class="locate_btn">대구
                <span><em class="counter"><?=$count19_per?></em>%</span>
              </p>
              <p id="ulsan" class="locate_btn">울산
                <span><em class="counter"><?=$count21_per?></em>%</span>
              </p>
              <p id="kyungnam" class="locate_btn">경남
                <span><em class="counter"><?=$count18_per?></em>%</span>
              </p>
              <p id="busan" class="locate_btn">부산
                <span><em class="counter"><?=$count20_per?></em>%</span>
              </p>
              <p id="jeonbook" class="locate_btn">전북
                <span><em class="counter"><?=$count14_per?></em>%</span>
              </p>
              <p id="gwangju" class="locate_btn">광주
                <span><em class="counter"><?=$count16_per?></em>%</span>
              </p>
              <p id="jeonam" class="locate_btn">전남
                <span><em class="counter"><?=$count15_per?></em>%</span>
              </p>
              <p id="jeju" class="locate_btn">제주
                <span><em class="counter"><?=$count17_per?></em>%</span>
              </p>
            </div>
            <p class="voteVal">지역별</p>
          </div>
        </div>

      </div>
      <div class="blk_bg"></div>
    </div>
    <!-- 현황팝업끝 -->
    
    
<script>
  // 남/녀 그래프
  var pieColors = (function () {
    var colors = [],
      base = Highcharts.getOptions().colors[0],
      i;

    for (i = 0; i < 10; i += 1) {
      // Start out with a darkened base color (negative brighten), and end
      // up with a much brighter color
      colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
  }());

  // Build the chart
  Highcharts.chart('container', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: ''
    },
    // tooltip: {
    //   pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    // },
    colors: ['#4663c3', '#ff5858'],
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: false,
        cursor: 'pointer',
        // colors: pieColors,
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
          distance: -50,
          filter: {
            property: 'percentage',
            operator: '>',
            value: 2
          }
        }
      }
    },
    // legend: {
    //   itemStyle: {
    //     color: '#000000',
    //     fontWeight: 'bold',
    //     fontSize: '20px'
    //   }
    // },
    series: [{
      name: '투표율',
      data: [{
          name: '남성',
          y: <?=$count23?>
        },
        {
          name: '여성',
          y: <?=$count24?>
        }
      ]
    }],
    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            align: 'center',
            verticalAlign: 'bottom',
            layout: 'horizontal'
          },
          yAxis: {
            labels: {
              align: 'left',
              x: 0,
              y: 0
            },
            title: {
              text: null
            }
          },
          subtitle: {
            text: null
          },
          credits: {
            enabled: false
          },
          // plotOptions: {
          //   pie: {
          //     dataLabels: {
          //       distance: -50,
          //     }
          //   }
          // },

        }
      }]
    }
  });


  // var xValues = ["남성", "여성"];
  // var yValues = [55, 49];
  // var barColors = [
  //   "#4663c3",
  //   "#ff5858"
  // ];

  // new Chart("myChart", {
  //   type: "pie",
  //   data: {
  //     labels: xValues,
  //     datasets: [{
  //       backgroundColor: barColors,
  //       data: yValues
  //     }]
  //   },
  //   options: {
  //     title: {
  //       display: false,
  //     }
  //   },
  //   scales: {
  //     x: {
  //       display: true,
  //     },
  //     y: {
  //       display: true,
  //       type: 'logarithmic',
  //     }
  //   }
  // });

  // $(window).load(function () {
  //   setTimeout(function () {
  //     $("#myChart").prependTo(".gender");
  //   }, 5000);

  // });
</script>    