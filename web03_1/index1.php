  <?php
    include_once 'head.php';
    $sql="select * from rr where display='1' order by rank";
    $rrArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $rrJson=json_encode($rrArr);

  ?>
  <style>
  	#ani1{
		position:relative;/*相對位置*/
		animation: ani1 5s ease-out infinite;
		}
	@keyframes ani1{
		from {left: -300px;}
    to {left: 300px;}
    }
  #ani2{
		position:relative;/*相對位置*/
		animation: ani2 5s ease-out infinite;
		}
	@keyframes ani2{
		from {opacity: 0;}
    to {opacity: 1;}
    }
  #ani3{
		position:relative;/*相對位置*/
		animation: ani3 5s ease-out infinite;
		}
	@keyframes ani3{
		from {width: 0%;}
    to {width: 100%;}
		}
  </style>
  <div id="mm">
    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <!-- <ul class="lists"></ul> -->
          <!-- <ul class="controls"></ul> -->
      <div id="showBig" align='center' style='height:300px;'></div><!-- ***** -->
      <div id="showList" align='center' style='height:100px;display: flex;justify-content:center;'><!-- ***** -->
        <div onclick='pp(1)'  style=''><img src='imgs/01E01.jpg' width='30'></div><!-- ***** -->
<?php
    for($i=0;$i<count($rrArr);$i++){
      ?>
      <img src='imgs/<?=$rrArr[$i]['pic']?>'  width='70' style='' class='im' id='ssaa<?=$i?>' onclick='showImg(<?=$i?>)'/>
      <?php
    }
?>
        <div onclick='pp(2)'  style=''><img src='imgs/01E02.jpg' width='30'></div><!-- ***** -->
      </div><!-- ***** -->
        </div>
      </div>
    </div>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <!-- <table border='1'>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div> -->
<?php include_once("index_movielist.php")?>
      </div>
    </div>
  </div>
  <?php
include_once 'footer.php';
?>
<script>
  var rrObj = <?=$rrJson?>;  
  var rrObj_len = rrObj.length;
  var i = 2;
  setInterval("autoImg()", 5000);
  function autoImg() {
    $('#showBig').html(
      "<div id='ani"+rrObj[i]['ani']+
      "'><img src='imgs/" + rrObj[i]['pic'] +
       "' width='50%'><p>"+rrObj[i]['name']+
       "</p></div>"
      );
    i++;
    if (i >= rrObj_len) i = 0;
  }
  autoImg();//必須先載入，同第一題
  //______________________
  var nowpage=0,num=rrObj_len;
  function pp(x)
  {
    var s,t;
    if(x==1&&nowpage-1>=0)
    {nowpage--;}
    if(x==2&&(nowpage+4)<num)//nowpage+4
    {nowpage++;}
    $(".im").hide()
    for(s=0;s<=3;s++)//s<=3
    {
      t=s*1+nowpage*1;
      $("#ssaa"+t).show()
    }
  }
  pp(1)//必須先載入，同第一題
  //______________________
  function showImg(i) { //指定圖片直接叫用 若要阻斷setInterval太麻煩
    $('#showBig').html(
      "<div id='ani"+rrObj[i]['ani']+
      "'><img src='imgs/" + rrObj[i]['pic'] +
       "' width='50%'><p>"+rrObj[i]['name']+
       "</p></div>"
      );
  }
</script>
