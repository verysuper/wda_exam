<?php
  include_once '_config.php';
  $sql="select * from rr where display=1";
  $rrArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);  
  $rrJson=json_encode($rrArr);
  // print_r($rrJson);
?>
<div id='picShow' style="height:300px;width:250px;margin:0 auto;">
</div>
<div id='picList' style="height:100px;">
  <img src="assets/01E01.jpg" width='60' height='100' onclick='pp(1)'>
  <?php
    for($i=0;$i<count($rrArr);$i++){
      ?>
        <img src="imgs/<?=$rrArr[$i]['pic']?>" width='60' height='100' class='im' id='ssaa<?=$i?>' onclick='oneShow(<?=$i?>)'>
      <?php
    }
  ?>
  <img src="assets/01E02.jpg" width='60' height='100' onclick='pp(2)'>
</div>
<script>
  var rrObj=<?=$rrJson?>;
  var rrLen=rrObj.length;
  var i=0;
  setInterval('autoShow()',3000);
  function autoShow(){
    $("#picShow").html(
      "<img src='imgs/"+rrObj[i]['pic']+"' id='ani' width='250' height='300'>"
    );
    switch(rrObj[i]['ani']){
      case '1':
        $("#ani").width('0').height('0');//直接設定
        $("#ani").animate({width:'+=100%',height:'+=100%'},3000);
    }
    i++;
    if(i>=rrLen){i=0;}
  }
  autoShow();
  var nowpage=0;
  function pp(x){
    var s,t;
    if(x==1&&nowpage-1>=0){
      nowpage--;
    }
    if(x==2&&(nowpage+4)<rrLen){
      nowpage++;
    }
    $(".im").hide()
    for(s=0;s<=3;s++){
      t=s*1+nowpage*1;
      $("#ssaa"+t).show()
    }
  }
  pp(1)
  function oneShow(x){
    $("#picShow").html(
      "<img src='imgs/"+rrObj[x]['pic']+"' id='ani' width='250' height='300'>"
    );
  }
</script>
