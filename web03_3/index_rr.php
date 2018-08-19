<?php
  $sql="select * from rr where rrlook=1";
  $rrArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $rrJson=json_encode($rrArr);
?>
<div id="picShow" style='height:300px;'>
</div>
<div id="picList" style="height:100px;">
  <img src="assets/01E01.jpg" width='60' onclick='pp(1)'>
  <?php
    for($i=0;$i<count($rrArr);$i++){
      ?>
        <img src="imgs/<?=$rrArr[$i]['rrpic']?>" width='60' class='im' id='ssaa<?=$i?>' onclick='oneShow(<?=$i?>)'>
      <?php
    }
  ?>
  <img src="assets/01E02.jpg" width='60' onclick='pp(2)'>
</div>
<script>
  var rrObj=<?=$rrJson?>;
  var rrLen=rrObj.length;
  var i=0;
  setInterval("autoShow()",5000);
  function autoShow(){
    $('#picShow').html(
      "<div id='ani' style='position:absolute;'><img src='imgs/"+
      rrObj[i]['rrpic']+
      "' width=250></div>"
    );
    switch(rrObj[i]['rrani']) {
    case '1':
        $("#ani").width('0').height('0');//直接設定
        $("#ani").animate({width:'+=100%',height:'+=100%'},3000);
        break;
    case '2':
        $("#ani").animate({left:'500px'},3000);
        break;
    case '3':
        $("#ani").animate({opacity: '0'},3000);
        break; 
    }
    i++;
    if(i>=rrLen){i=0}
  }
  autoShow();
  var nowpage=0;
  function pp(x){
    var s,t;
  if(x==1&&nowpage-1>=0)
  {nowpage--;}
  if(x==2&&(nowpage+4)<rrLen)
  {nowpage++;}
  $(".im").hide()
  for(s=0;s<=3;s++){
    t=s*1+nowpage*1;
    $("#ssaa"+t).show()
    }
  }
  pp(1)
  function oneShow(x){
  $('#picShow').html(
    "<div id='ani' style='position:absolute;'><img src='imgs/"+
    rrObj[x]['rrpic']+
    "' width=250></div>"
  );
}
</script>
