<?php
  include_once("head.php");
  $n1 = $_POST["s1"];
  $n2 = $_POST["s2"];
  $n3 = $_POST["s3"];
?>
<style>
  #ding{
    width:375px;
    min-height:320px;
    margin:0 auto;
  }
  .dingwa{
    width:60px;
    height:100px;
    display:inline-block;
    margin:5px;
  }
  .cb{
    width:20px;
    height:20px;
    margin:0 auto;
  }
</style>
<form method="post" action="owo.php">
<input type="hidden" value="<?=$n1?>" name="n1">
<input type="hidden" value="<?=$n2?>" name="n2">
<input type="hidden" value="<?=$n3?>" name="n3">
  <div id="mm">
    <div id = "ding">
<?php
  for($i=1;$i<=20;$i++){
    $j = ceil($i/5);
    $k = $i - (($j - 1) * 5) ;
    $sql = "select * from ding_log where d_l_day ='".$n2."' and d_l_m = '".$n1."' and d_l_time = '".$n3."' and d_l_jo = '$i'";
    $ro = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($ro);
?>
      <div class="dingwa">
        <img src="images/a<?=$totle?>.png"><br>
        <?=$j?>排-<?=$k?>號<br>
<div class="cb"><?php if($totle == 0){?><input type="checkbox" name="aa[]" id="cs<?=$i?>" value="<?=$i?>" onclick="check_select(<?=$i?>);"><?php }else{echo "<br>";}?></div>
      </div>
<?php }?>
    </div>
<table>
  <tr>
    <td>
      電影:<br>
      時刻:<br>
      您已勾選了 <span id="c1"></span> 張票，最多可以選擇 4 張票
    </td>
  </tr>
</table>
  <input type="submit" value="訂購">
  <input type="button" value="上一步" onclick="document.location.href='ticket.php?no=<?=$n1?>&no2=<?=$n2?>&no3=<?=$n3?>'">
<script>
  var totle_select = 0 ;//統計點選的次數
  function check_select(cc){
    ooxx = document.getElementById("cs"+cc).checked;//偵測點擊的狀態
    if( ooxx != true){
      totle_select = totle_select -1;
    }else{
      if(totle_select >= 4){//如果數量已滿則取此次點擊動作
        document.getElementById("cs"+cc).checked = false;
      }else{
        totle_select = totle_select + 1;
      }
    }
    document.getElementById("c1").innerHTML=totle_select;
  }
</script>
</form
  </div>
<?php include_once("footer.php")?>