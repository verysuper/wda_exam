<?php
  $link=mysqli_connect("localhost","root","","db00_q3");
  mysqli_query($link,"set names utf8");
  $s2 = $_POST["s2"];//日期
  $ss = $_POST["ss"];//索引鍵
for($i=1;$i<=5;$i++){
  $ya[$i] = "20".$i;
}
  $ttt = strtotime("+6hour");
  $today = date("Y-m-d",$ttt); //抓今天日期(用來判斷訂票時間是否是今天)
  $time = date("H",$ttt); //抓現在時間時分秒(用來判斷訂票場次)
  if( $s2 != $today){
?>
<select name="s3">
  <option>請選擇場次</option>
  <option value="1">14:00~16:00 剩餘座位 <?=$ya[1]?></option>
  <option value="2">16:00~18:00 剩餘座位 <?=$ya[2]?></option>
  <option value="3">18:00~20:00 剩餘座位 <?=$ya[3]?></option>
  <option value="4">20:00~22:00 剩餘座位 <?=$ya[4]?></option>
  <option value="5">22:00~24:00 剩餘座位 <?=$ya[5]?></option>
</select>
<?php
  }else{
?>
<select name="s3">
  <option>請選擇場次</option>
    <?php if($time < 14){?><option value="1">14:00~16:00 剩餘座位 <?=$ya[1]?></option><?php }?>
    <?php if($time < 16){?><option value="2">16:00~18:00 剩餘座位 <?=$ya[2]?></option><?php }?>
    <?php if($time < 18){?><option value="3">18:00~20:00 剩餘座位 <?=$ya[3]?></option><?php }?>
    <?php if($time < 20){?><option value="4">20:00~22:00 剩餘座位 <?=$ya[4]?></option><?php }?>
    <?php if($time < 22){?><option value="5">22:00~24:00 剩餘座位 <?=$ya[5]?></option><?php }?>
</select>
<?php  
  }
?>