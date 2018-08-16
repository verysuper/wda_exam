<?php
  $sql="select * from rr where rrlook='1'";
  $rrAll=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>".print_r($rrAll,true)."</pre>";
  $rrJson=json_encode($rrAll);
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
</style>
<div id="abgne-block-20111227">
  <div id="picShow" style="height:300px;" align="center">    
  </div>
  <div id="picList" style="height:100px;display:flex;justify-content:center">
    <img src="assets/01E01.jpg" alt="" onclick="pp('1')">
    <?php
      for($i=0;$i<count($rrAll);$i++){
        ?>
          <img src="imgs/<?=$rrAll[$i]['rrpic']?>" width=70 class="im" id="ssaa<?=$i?>" onclick="oneShow(<?=$i?>)">
        <?php
      }
    ?>
    <img src="assets/01E02.jpg" alt="" onclick="pp('2')">
  </div>
</div>
<script>
  var rrObj=<?=$rrJson?>;
  var rrLen=rrObj.length;
  var i=2;
  setInterval("autoShow()",5000);
  function autoShow(){
    $("#picShow").html(
      "<div id='ani"+rrObj[i]['rrani']+
      "'><img src='imgs/"+rrObj[i]['rrpic']+
      "' width='50%'><p>"+rrObj[i]['rrname']+"</p></div>"
    );
    i++;
    if(i>=rrLen){i=0;}
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
    for(s=0;s<=3;s++)
    {
      t=s*1+nowpage*1;
      $("#ssaa"+t).show()
    }
  }
  pp(1)
  function oneShow(i){
    $("#picShow").html(
      "<div id='ani"+rrObj[i]['rrani']+
      "'><img src='imgs/"+rrObj[i]['rrpic']+
      "' width='50%'><p>"+rrObj[i]['rrname']+"</p></div>"
    );
  }
</script>
